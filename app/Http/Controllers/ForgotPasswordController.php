<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SendPasswordResetLink;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form.
     * Your blade already uses: name="email" (can be email or phone)
     */
    public function forgotPasswordView()
    {
        return view('forgot_password.index');
    }


    private function sendResetLinkEmail($email, $token)
    {
        //send email with reset link
        $actionLink = route('forgot.password.reset', ['token' => $token, 'email' => $email]);

        //send password reset data to mail
        $data = [
            'actionLink' => $actionLink,
            'email' => $email,
            'token' => $token
        ];

        //send password reset link via mail
        return Mail::to($email)->send(new SendPasswordResetLink($data));
    }


    /**
     * STEP 1: Send reset
     * - If input is email: send reset link (60-char token) -> password_resets.email = email
     * - If input is phone: send OTP SMS (6-digit) -> password_resets.email = +88phone, token = OTP
     * No new routes/columns needed.
     */
    public function forgotPasswordSend(Request $request)
    {
        // Your current blade posts 'email' which can be an email OR a phone
        $request->validate(['email' => 'required|string|max:255']);
        $id = trim($request->email);

        // ===== EMAIL FLOW (reset link) =====
        if (filter_var($id, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $id)->first();

            // Generic response to avoid account enumeration
            if (!$user) {
                return back()->with('success', 'If the account exists, a reset message has been sent.');
            }

            $token = Str::random(60);

            PasswordReset::updateOrCreate(
                ['email' => $user->email],
                ['token' => $token, 'created_at' => now(), 'updated_at' => now()]
            );

            // Simple email (use your Mailable if you prefer)
            // $actionLink = route('forgot.password.reset', ['token' => $token, 'email' => $user->email]);
            // Mail::raw("Reset your password: {$actionLink}", function($m) use ($user){
            //     $m->to($user->email)->subject('Password Reset Link');
            // });


            // Send reset link email
            $this->sendResetLinkEmail($request->email, $token);

            return back()->with('success', 'If the account exists, a reset message has been sent.');
        }

        // ===== PHONE FLOW (OTP) =====
        $phone = $this->normalizePhone($id);
        if (!preg_match('/^\+88[0-9]{11}$/', $phone ?? '')) {
            return back()->with('error', 'Invalid phone. Use 01XXXXXXXXX format.')->withInput();
        }

        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return back()->with('success', 'If the account exists, a reset message has been sent.');
        }

        // Optional rate limit: max 3 per hour
        $recent = PasswordReset::where('email', $phone)
                    ->where('created_at', '>=', now()->subHour())->count();
        if ($recent >= 3) {
            return back()->with('error', 'Too many attempts. Try again later.');
        }

        $otp = (string) random_int(100000, 999999);

        PasswordReset::updateOrCreate(
            ['email' => $phone], // store phone in 'email' column
            ['token' => $otp, 'created_at' => now(), 'updated_at' => now()]
        );

        // Send SMS via your helper if available
        if (function_exists('sendSms')) {
            // Some gateways dislike '+', so we'll strip it
            @sendSms(str_replace('+', '', $phone), "Your reset OTP is {$otp}. It expires in 10 minutes. -MuslimBiye");
        } else {
            Log::info("SMS to {$phone}: OTP {$otp}");
        }

        // Redirect to your existing reset route (no new routes)
        // Here token=OTP and email=phone; resetPasswordView will show OTP screen first.
        return redirect()->route('forgot.password.reset', ['token' => $otp, 'email' => $phone])
               ->with('success', 'If the account exists, a reset message has been sent.');
    }

    /**
     * STEP 1.5: Show OTP verify page first for phone (if not yet verified).
     * For email, or if phone OTP already verified, show the password form directly.
     *
     * Route: GET /reset/password/{token}?email=<email OR +88phone>
     */
    public function resetPasswordView(Request $request, $token = null)
    {
        $email = $request->email; // may be real email OR +88phone
        $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        // Phone flow: if OTP not verified yet, show OTP page first
        if (!$isEmail && !session('fp_otp_ok')) {
            return view('forgot_password.otp_before_reset', [
                'token' => $token, // token here is the OTP from URL
                'email' => $email, // +88 phone
            ]);
        }

        // Email flow OR OTP already verified -> show reset form
        return view('forgot_password.reset_password', compact('token', 'email'));
    }

    /**
     * STEP 2: Submit final reset.
     * This method handles two phases:
     *  - Phase A (verify_only): Verify OTP for phone, then swap to a new 60-char token and redirect back to the same GET route so reset form shows.
     *  - Phase B (final): Validate token + identifier and change password.
     *
     * Route: POST /reset/password
     */
    public function resetPassword(Request $request)
    {
        // ===== Phase A: OTP verify only (phone flow) =====
        if ($request->has('verify_only')) {
            $request->validate([
                'email' => 'required|string|max:255', // phone stored here
                'token' => 'required|string|max:255', // OTP coming from URL
                'otp'   => 'required|string|max:10',
            ]);

            $identifier = trim($request->email);
            $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                $identifier = $this->normalizePhone($identifier);
            }

            // password_resets.email = identifier (for phone: +88...), token = OTP
            $row = PasswordReset::where('email', $identifier)->first();
            if (!$row || $row->token !== $request->otp) {
                return back()->withErrors(['otp' => 'Invalid OTP.'])->withInput();
            }
            // Expiry: 10 minutes
            if (Carbon::parse($row->created_at)->lt(now()->subMinutes(10))) {
                return back()->withErrors(['otp' => 'OTP expired. Request a new one.'])->withInput();
            }

            // OTP OK -> create a fresh 60-char token for the final password form
            $newToken = Str::random(60);
            $row->token = $newToken;
            $row->updated_at = now();
            $row->save();

            // Mark as verified for this session; next GET will directly show reset form
            session(['fp_otp_ok' => true]);

            // Redirect back to same GET reset route, now with the new long token
            return redirect()->route('forgot.password.reset', ['token' => $newToken, 'email' => $identifier]);
        }

        // ===== Phase B: Final password set (email or phone) =====
        $request->validate([
            'email' => 'required|string|max:255', // email OR phone
            'token' => 'required|string|max:255', // 60-char token at this stage
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $identifier = trim($request->email);
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        if (!$isEmail) {
            $identifier = $this->normalizePhone($identifier);
        }

        $row = PasswordReset::where('email', $identifier)
                ->where('token', $request->token)->first();

        if (!$row) {
            return back()->with('error', 'Invalid token or identifier!')->withInput();
        }
        // Expiry: 10 minutes (you can increase if needed)
        if (Carbon::parse($row->created_at)->lt(now()->subMinutes(10))) {
            return back()->with('error', 'Token expired. Request a new one.')->withInput();
        }

        // Find user by email or phone
        $user = $isEmail
            ? User::where('email', $identifier)->first()
            : User::where('phone', $identifier)->first();

        if (!$user) {
            return back()->with('error', 'Account not found for this identifier.')->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // cleanup and session flag clear
        $row->delete();
        session()->forget('fp_otp_ok');

        return redirect()->route('user.auth.login')->with('success', 'Password reset successfully!');
    }

    /* ----------------- helpers ----------------- */

    // Normalize to +88XXXXXXXXXXX
    private function normalizePhone(?string $phone): ?string
    {
        if (!$phone) return null;
        $p = preg_replace('/\s+/', '', $phone);
        if (!str_starts_with($p, '+88')) $p = '+88'.$p;
        return $p;
    }
}
