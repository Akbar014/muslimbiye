<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ThirdPartLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                if (Auth::guard('user')->loginUsingId($finduser->id, true)) {
                    if ($finduser->can_login == 1) {
                        $token = $finduser->createToken('userApiToken')->accessToken;
                        Cookie::queue('access_token', $token, 4500);
                        if (session()->has('redirect')) {
                            return redirect()->to(session('redirect'));
                        }
                        return redirect()->route('user.dashboard');
                    } else {
                        // if unsuccessful, then redirect back to the login with the form data
                        $err = ['email' => 'Sorry! You Can Not Login'];
                        Auth::guard('user')->logout();
                        Cookie::forget('access_token');
                        return view('auth.login', compact('user', 'err'));
                    }
                } else {
                    return view('auth.registration', compact('finduser'));
                }
            } else {
                $newUser = new User();
                $newUser->email = $user->email;
                $newUser->otp = "000000";
                $newUser->verified_by = "email";
                $newUser->save();
                return redirect()->route('user.auth.registration')->with('email_or_phone', $newUser->email);
            }
        } catch (\Throwable $th) {
            if (env('APP_DEBUG', false)) {
                dd($th);
            }
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }




    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = Admin::where('fb_id', $user->id)->first();

            if ($finduser) {

                if (Auth::guard('admin')->attempt(['email' => $finduser->email, 'password' => "123456dummy", 'fb_id' => $finduser->fb_id, 'status' => 1])) {
                    // if successful, then redirect to their intended location
                    $user = Auth::guard('admin')->user();
                    $token = $user->createToken('userApiToken')->accessToken;
                    Cookie::queue('access_token', $token, 4500);
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('user.auth.login');
            } else {
                $finduserByEmail = Admin::where('email', $user->email)->first();
                if ($finduserByEmail) {
                    return redirect()->back()->withErrors(['email' => "You didn't create your account with Facebook, login with email instead"])->withInput();
                }
                $newUser = Admin::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => 1,
                    'can_login' => 1,
                    'user_type' => 11,
                    'role_id' => 11,
                    'fb_id' => $user->id,
                    'password' => Hash::make("123456dummy")
                ]);

                $newUser->roles()->sync(11);

                if (Auth::guard('admin')->attempt(['email' => $newUser->email, 'password' => "123456dummy", 'google_id' => $newUser->google_id, 'status' => 1])) {
                    // if successful, then redirect to their intended location
                    $user = Auth::guard('admin')->user();
                    $token = $user->createToken('userApiToken')->accessToken;
                    Cookie::queue('access_token', $token, 4500);
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('admin.dashboard');
            }
        } catch (Exception $e) {
            if (env('APP_DEBUG', false)) {
                dd($e);
            }
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }
}