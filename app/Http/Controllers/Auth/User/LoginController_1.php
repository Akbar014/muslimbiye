<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Mail\OTP;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    /**
     * ছোট হেল্পার: BD ফোন নম্বর normalize → +88-prefixed
     * 017XXXXXXXX  => +88017XXXXXXXX
     * +88017XXXXXX => +88017XXXXXX (যেমন আছে তেমনই)
     * 88017XXXXXXX => +88017XXXXXXX
     * 17XXXXXXXXX  => +8817XXXXXXXXX
     */
    private function normalizeBdPhone(?string $raw): ?string
    {
        if (!$raw) return null;

        $p = preg_replace('/\D+/', '', $raw); // non-digit remove

        // ইতিমধ্যেই 880... হলে (country code সহ), '+' যোগ করি
        if (strpos($p, '880') === 0) {
            return '+'.$p;
        }

        // 0 দিয়ে শুরু হলে 0 বাদ দিয়ে 88 যোগ
        if (strpos($p, '0') === 0) {
            return '+88'.substr($p, 1);
        }

        // 1 দিয়ে শুরু হলে +88 যোগ
        if (strpos($p, '1') === 0) {
            return '+88'.$p;
        }

        // 88 দিয়ে শুরু হলে '+' যোগ
        if (strpos($p, '88') === 0) {
            return '+'.$p;
        }

        // অন্য যেকোনো কেসে: সimply + যোগ
        return '+'.$p;
    }

    /**
     * BD ফোন regex: +8801XXXXXXXXX (বাস্তবে +88... normalizer-ই কভার করছে)
     */
    private function isValidBdPhone(string $phone): bool
    {
        // উদাহরণ: +8801XXXXXXXXX (মোট 14 char)
        return (bool) preg_match('/^\+8801[0-9]{9}$/', $phone);
    }

    /**
     * Login form
     */
    public function login(Request $request)
    {
        if ($request->has('redirect')) {
            session()->put('redirect', $request->redirect);
        } else {
            session()->forget('redirect');
        }
        return view('auth.login');
    }

    /**
     * Step-1: mail or phone ইনপুট → যদি ইউজার আছে password page, নাহলে OTP পাঠাও
     */
    public function loginUser(Request $request)
    {
        $mailOrPhone = trim((string) $request->mail_phone);

        if (filter_var($mailOrPhone, FILTER_VALIDATE_EMAIL)) {
            $email = strtolower($mailOrPhone);
            $user  = User::where('email', $email)->first();

            if ($user) {
                return $this->password($user);
            } else {
                $otp = generateOTP();
                try {
                    Mail::to($email)->send(new OTP(["otp" => $otp]));
                } catch (\Throwable $th) { /* swallow */ }

                $user = new User();
                $user->email = $email;
                $user->otp   = $otp;
                $user->save();

                return view('auth.otp', compact('email'));
            }
        }

        // phone flow
        $phone = $this->normalizeBdPhone($mailOrPhone);
        if (!$phone || !$this->isValidBdPhone($phone)) {
            return redirect()->back()
                ->withErrors(['mail_phone' => 'Phone Number is not valid Bangladeshi Number'])
                ->withInput();
        }

        $user = User::where('phone', $phone)->first();
        if ($user) {
            return $this->password($user);
        } else {
            $otp = generateOTP();
            try {
                // তোমার প্রজেক্টের SMS gateway কল করো
                // sendSms(ltrim($phone, '+'), "Your registration code is: $otp -MuslimBiye");
            } catch (\Throwable $th) { /* swallow */ }

            $user = new User();
            $user->phone = $phone;
            $user->otp   = $otp;
            $user->save();

            return view('auth.otp', compact('phone'));
        }
    }

    /**
     * যদি ইউজারের password থাকে → password পেজ
     * নাহলে → OTP পাঠিয়ে OTP পেজ
     */
    public function password(User $user)
    {
        if ($user->email && $user->password) {
            return view('auth.password', compact('user'));
        }

        $otp = generateOTP();

        if ($user->email) {
            try {
                Mail::to($user->email)->send(new OTP(["otp" => $otp]));
            } catch (\Throwable $th) {}
            $user->otp = $otp;
            $user->save();
            $email = $user->email;
            return view('auth.otp', compact('email'));
        }

        if ($user->phone) {
            try {
                // sendSms(ltrim($user->phone, '+'), "Your registration code is: $otp -MuslimBie");
            } catch (\Throwable $th) {}
            $user->otp = $otp;
            $user->save();
            $phone = $user->phone;
            return view('auth.otp', compact('phone'));
        }

        // fallback
        return redirect()->route('user.auth.login');
    }

    /**
     * Existing user password login (remember=true)
     */
public function existingUserLogin(Request $request)
{

    dd($request->all());
    // 1) Validate: either email or phone + password
    $rules = [
        'password' => 'required|string|min:8',
        'email'    => 'nullable|string|email|max:255|required_without:phone',
        'phone'    => 'nullable|string|max:20|required_without:email',
    ];
    $messages = [
        'password.required'      => 'The password field is required.',
        'password.min'           => 'The password must be at least 8 characters.',
        'email.required_without' => 'Email or Phone is required.',
        'phone.required_without' => 'Phone or Email is required.',
        'email.email'            => 'The email must be a valid email address.',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // 2) Identify (email or phone)
    $credentials = ['password' => $request->password, 'status' => '1'];

    if ($request->filled('email')) {
        $email = strtolower($request->email);
        $credentials['email'] = $email;
        $user = User::where('email', $email)->first();
    } else {
        $phoneNormalized = $this->normalizeBdPhone($request->phone);
        if (!$phoneNormalized || !$this->isValidBdPhone($phoneNormalized)) {
            return back()->withErrors(['phone' => 'Invalid Bangladeshi phone (+8801XXXXXXXXX).'])->withInput();
        }
        $credentials['phone'] = $phoneNormalized;
        $user = User::where('phone', $phoneNormalized)->first();
    }

    if (!$user) {
        return back()->withErrors(['mail_phone' => 'User not found'])->withInput();
    }

    // 3) Try login once (remember = true)
    if (! Auth::guard('user')->attempt($credentials, true)) {
        return back()->withErrors(['password' => 'Password not matched'])->withInput();
    }

    // 4) Additional gate (optional)
    if ($user->can_login != 1) {
        Auth::guard('user')->logout();
        Cookie::forget('access_token');
        return back()->withErrors(['email' => 'Sorry! You can not login'])->withInput();
    }

    // 5) Issue API token cookie (if you use it)
    $token = $user->createToken('userApiToken')->accessToken;
    Cookie::queue('access_token', $token, 4500);

    // 6) Redirect
    if (session()->has('redirect')) {
        return redirect()->to(session('redirect'));
    }
    return redirect()->route('user.edit_biodata.index')->with('success', 'মুসলিম বিয়ে-তে আপনাকে আন্তরিক স্বাগতম!');
}



    /**
     * OTP verify → registration step
     */
    public function otp(Request $request)
    {
        if ($request->has('email')) {
            $email = strtolower($request->email);
            $user  = User::where('email', $email)->first();
            if ($user) {
                if ($user->otp === $request->otp) {
                    $user->verified_by = 'email';
                    $user->save();
                    return redirect()->route('user.auth.registration')->with('email_or_phone', $user->email);
                }
                return redirect()->back()->withErrors(['otp' => "OTP Doesn't Matched"]);
            }
            return redirect()->route('user.auth.login')->withErrors(['otp' => 'User Not Found']);
        }

        if ($request->has('phone')) {
            $phone = $this->normalizeBdPhone($request->phone);
            $user  = $phone ? User::where('phone', $phone)->first() : null;

            if ($user) {
                if ($user->otp === $request->otp) {
                    $user->verified_by = 'phone';
                    $user->save();
                    return redirect()->route('user.auth.registration')->with('email_or_phone', $user->phone);
                }
                return redirect()->back()->withErrors(['otp' => "OTP Doesn't Matched"]);
            }
            return redirect()->route('user.auth.login')->withErrors(['otp' => 'User Not Found']);
        }

        return redirect()->back()->withErrors(['otp' => 'OTP Error!']);
    }

    /**
     * Registration form (after OTP)
     */
    public function registration()
    {
        $email_or_phone = session('email_or_phone');
        if (!$email_or_phone) {
            return redirect()->route('user.auth.login');
        }

        if (filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', strtolower($email_or_phone))->first();
        } else {
            $user = User::where('phone', $this->normalizeBdPhone($email_or_phone))->first();
        }

        return view('auth.registration', compact('user'));
    }

    /**
     * Complete registration (remember=true), email + phone উভয় ভ্যালিডেশন
     * - phone: +88 সহ/ছাড়া দুইভাবেই নেয়, normalize করে সেভ
     * - unique: OTP-তে তৈরি হওয়া user-কে ignore করে conditional Rule::unique
     */
    public function registerUser(Request $request)
    {
        $normalizedPhone = $this->normalizeBdPhone($request->phone);

        // প্রথমে OTP ধাপের ইউজার বের করি (email বা phone দিয়ে)
        if ($request->verified_by === 'email') {
            $user = User::where('email', strtolower($request->email))->first();
            $email_or_phone = strtolower($request->email);
        } else {
            $user = $normalizedPhone ? User::where('phone', $normalizedPhone)->first() : null;
            $email_or_phone = $normalizedPhone;
        }

        // ভ্যালিডেশন রুলস (conditional unique; $user থাকলে তাকে ignore)
        $rules = [
            'name'     => ['required','string','max:255'],
            'password' => ['required','string','min:8','confirmed'],
            'phone'    => ['required','string','max:20', function ($attr,$val,$fail) use ($normalizedPhone) {
                if (!$normalizedPhone) return $fail('Invalid phone supplied.');
                if (!$this->isValidBdPhone($normalizedPhone)) return $fail('Phone must be a valid Bangladeshi number (+8801XXXXXXXXX).');
            }],
            'email'    => ['required','string','email','max:255'],
        ];

        $rules['email'][] = Rule::unique('users','email')->ignore($user?->id);

        // phone unique
        $rules['phone'][] = Rule::unique('users','phone')->ignore($user?->id);

        $messages = [
            'name.required'       => 'The name field is required.',
            'password.required'   => 'The password field is required.',
            'password.min'        => 'The password must be at least 8 characters.',
            'password.confirmed'  => 'The password confirmation does not match.',
            'phone.required'      => 'The phone field is required.',
            'email.required'      => 'The email field is required.',
            'email.email'         => 'The email must be a valid email address.',
            'email.unique'        => 'The Email has already been taken.',
            'phone.unique'        => 'The Phone has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('user.auth.registration')
                ->with('email_or_phone', $email_or_phone)
                ->withErrors($validator->errors())
                ->withInput();
        }

        if (!$user) {
            // OTP-তে record না পেলে লগইনে ফেরত
            return redirect()->route('user.auth.login');
        }

        // আপডেট/সেভ
        $user->name     = $request->name;
        $user->email    = strtolower($request->email);
        $user->phone    = $normalizedPhone;
        $user->password = Hash::make($request->password);
        $user->save();

        // Auto-login (remember=true)
        if (
            Auth::guard('user')->attempt(['email' => $user->email, 'password' => $request->password, 'status' => '1'], true) ||
            Auth::guard('user')->attempt(['phone' => $user->phone, 'password' => $request->password, 'status' => '1'], true)
        ) {
            if ($user->can_login == 1) {
                $token = $user->createToken('userApiToken')->accessToken;
                Cookie::queue('access_token', $token, 4500);

                if (session()->has('redirect')) {
                    return redirect()->to(session('redirect'))->with('success', 'মুসলিম বিয়ে-তে আপনাকে আন্তরিক স্বাগতম!');
                }
                return redirect()->route('user.edit_biodata.index')->with('success', 'মুসলিম বিয়ে-তে আপনাকে আন্তরিক স্বাগতম!');
            }

            $errors = ['email' => 'Sorry! You Can Not Login'];
            Auth::guard('user')->logout();
            Cookie::forget('access_token');
            return redirect()->route('user.auth.registration')
                ->with('email_or_phone', $email_or_phone)
                ->withInput()
                ->withErrors($errors);
        }

        $errors = ['unsuccessful' => 'Something Went Wrong'];
        return redirect()->route('user.auth.registration')
            ->with('email_or_phone', $email_or_phone)
            ->withErrors($errors)
            ->withInput();
    }

    /**
     * Real logout: session invalidate + CSRF regen
     */
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.auth.login')->with('success', 'See You Soon!');
    }
}
