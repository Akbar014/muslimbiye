<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Mail\SendPasswordResetLink;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
     /**
     * Show the forgot password form.
     *
     * @return \Illuminate\View\View
     */
    public function forgotPasswordView()
    {
        return view('forgot_password.index');
    }

    /**
     * Handle the forgot password form submission and send reset link.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPasswordSend(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email'
        ]);

        // Check if user with given email exists
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate reset token
            $token = Str::random(60);

            // Save token and email to password_resets table
            PasswordReset::updateOrCreate(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => now()]
            );

            // Send reset link email
            $this->sendResetLinkEmail($request->email, $token);

            return redirect()->back()->with('success', 'Reset password link sent to your email address!');

        }

        return redirect()->back()->with('error', 'Invalid email address!');
    }


    /**
     * Send the password reset link via email.
     *
     * @param string $email
     * @param string $token
     * @return void
     */
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
     * Show the password reset form.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null $token
     * @return \Illuminate\View\View
     */
    public function resetPasswordView(Request $request, $token = null)
    {
        //get email and token
        $email = $request->email;

        //return view with token and email
        return view('forgot_password.reset_password', compact('token', 'email'));
    }


    /**
     * Handle password reset form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        //request validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        //check if token is valid
        $checkToken = PasswordReset::where('email', $request->email)->where('token', $request->token)->first();

        //if token is valid
        if ($checkToken) {
            //update password in users table
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            //delete token from password_resets table
            $checkToken->delete();

            //redirect with success message
            return redirect()->route('user.auth.login')->with('success', 'Password reset successfully!');
        } else {
            //redirect with error message
            return redirect()->back()->with('error', 'Invalid token or email!');
        }
    }
}
