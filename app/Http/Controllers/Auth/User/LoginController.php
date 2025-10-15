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

class LoginController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */
   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   // protected $redirectTo = '/home';
   public function __construct()
   {
      $this->middleware('guest:user')->except('logout');
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
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

   public function loginUser(Request $request)
   {
      
      if (filter_var($request->mail_phone, FILTER_VALIDATE_EMAIL)) {
          
          
         $email = $request->mail_phone;
         $user = User::where('email', $email)->first(); 
         if ($user) { 
            return $this->password($user);
         } else {
            $otp = generateOTP();
            try {
               Mail::to($email)->send(new OTP(["otp" => $otp]));
            } catch (\Throwable $th) {
               // dd($email,$th);
            }
            $user = new User();
            $user->email = $email;
            $user->otp = $otp;
            $user->save();
        
            return view('auth.otp', compact('email'));
         }
      } else {
          
         $phone = str_contains($request->mail_phone, '+88') ? $request->mail_phone : "+88" . $request->mail_phone;
         $validator = validatePhoneNumber($phone);
         if (!$validator['status']) {
            //  dd($request->all());
            return redirect()->back()->with('email_or_phone', $request->email)->withErrors(['mail_phone' => 'Phone Number is not valid Bangladeshi Number'])->withInput();
         }
        //  dd($request->all());
         $user = User::where('phone', $phone)->first();
         
         if ($user) {
            return $this->password($user);
         } else {
            $otp = generateOTP();
            
            

            try {
                // dd($otp);
                
            //   sendSms(str_replace("+", "", $phone), "Your registration code is: " . $otp . ". -MuslimBie");
                $res =  sendSms($phone, "Your registration code is: " . $otp . ". -MuslimBiye");
                // dd($res);

            } catch (\Throwable $th) {
               //throw $th;
               // dd($th);
            }

            $user = new User();
            $user->phone = $phone;
            $user->otp = $otp;
            $user->save();
            // dd("OK");
            return view('auth.otp', compact('phone'));
         }
      }
   }

   public function password($user)
   {
      if ($user->email && $user->password) {
         return view('auth.password', compact('user'));
      } else {
         $otp = generateOTP();
         if ($user->email) {
            try {
               Mail::to($user->email)->send(new OTP(["otp" => $otp]));
            } catch (\Throwable $th) {
            }
            $user->otp = $otp;
            $user->save();
            $email = $user->email;
            return view('auth.otp', compact("email"));
         }
         if ($user->phone) {
            $phone = $user->phone;
            try {
               sendSms(str_replace("+", "", $phone), "Your registration code is: " . $otp . ". -MuslimBie");
            } catch (\Throwable $th) {
            }
            $user->otp = $otp;
            $user->save();
            return view('auth.otp', compact("phone"));
         }
      }
   }

   public function existingUserLogin(Request $request)
   {
      $rules = [
         'password' => 'required|string|min:8',
         'phone' => 'required|string|max:15|regex:/^[0-9+]+$/', // Adjust regex as needed
         'email' => 'required|string|email|max:255', // Email validation
      ];

      $messages = [
         'password.required' => 'The password field is required.',
         'password.min' => 'The password must be at least 8 characters.',
         'phone.required' => 'The phone field is required.',
         'phone.regex' => 'The phone number must contain only numbers.',
         'email.required' => 'The email field is required.',
         'email.email' => 'The email must be a valid email address.',
      ];
      $phone = str_contains($request->phone, '+88') ? $request->phone : "+88" . $request->phone;
      $validator = Validator::make($request->all(), $rules, $messages);
      $user = User::where('phone', $phone)->first();

      if (!$user) {
         return redirect()->route('user.auth.login')->withErrors('email_or_phone', 'user not found')->withInput();
      }

      if ($validator->fails()) {
         return redirect()->back()->with('user', $user)->withErrors($validator->errors())->withInput();
      }


      if (
         Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'], true) ||
         Auth::guard('user')->attempt(['phone' => $phone, 'password' => $request->password, 'status' => '1'], true)
      ) {
         // if successful, then create laravel passport token and redirect to their intended location
         if ($user->can_login == 1) {
            $token = $user->createToken('userApiToken')->accessToken;
            Cookie::queue('access_token', $token, 4500);
            if (session()->has('redirect')) {
               return redirect()->to(session('redirect'));
            }
            // return redirect()->route('user.dashboard');
              return redirect()->route('user.edit_biodata.index')->with('success', 'Welcome to Muslim Biye!');
         } else {
            // if unsuccessful, then redirect back to the login with the form data
            $err = ['email' => 'Sorry! You Can Not Login'];
            Auth::guard('user')->logout();
            Cookie::forget('access_token');
            return view('auth.password', compact('user', 'err'));
         }
      }
      // if unsuccessful, then redirect back to the login with the form data
      $err = ['unsuccessful' => 'Password Not Matched'];
      return view('auth.password', compact('user', 'err'));
   }

   public function otp(Request $request)
   {
      if ($request->has('email')) {
         $user = User::where('email', $request->email)->first();
         if ($user) {
            if ($user->otp === $request->otp) {
               $user->verified_by = 'email';
               $user->save();
               return redirect()->route('user.auth.registration')->with('email_or_phone', $user->email);
            } else {
               return redirect()->back()
                  ->withErrors(['otp' => 'OTP Doesn\'t Matched']);
            }
         } else {
            return redirect()->route('user.auth.login')->withErrors(['otp' => 'User Not Found']);
         }
      } elseif ($request->has('phone')) {
         $user = User::where('phone', $request->phone)->first();
         if ($user) {
            if ($user->otp === $request->otp) {
               $user->verified_by = 'phone';
               $user->save();
               return redirect()->route('user.auth.registration')->with('email_or_phone', $user->phone);
            } else {
               return redirect()->back()
                  ->withErrors(['otp' => 'OTP Doesn\'t Matched']);
            }
         } else {
            return redirect()->route('user.auth.login')->withErrors(['otp' => 'User Not Found']);
         }
      } else {
         return redirect()->back()
            ->withErrors(['otp' => 'OTP Error!']);
      }
   }

   public function registration()
   {
      $email_or_phone = session('email_or_phone');
      if ($email_or_phone) {
         if (filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $email_or_phone)->first();
         } else {
            $user = User::where('phone', $email_or_phone)->first();
         }
         return view('auth.registration', compact('user'));
      } else {
         return redirect()->route('user.auth.login');
      }
   }

   public function registerUser(Request $request)
   {

      $rules = [
         'name' => 'required|string|max:255',
         'password' => 'required|string|min:8|confirmed',
         'phone' => 'required|string|max:15|regex:/^[0-9+]+$/', // Adjust regex as needed
         'email' => 'required|string|email|max:255', // Email validation
      ];

      $messages = [
         'name.required' => 'The name field is required.',

         'password.required' => 'The password field is required.',
         'password.min' => 'The password must be at least 8 characters.',
         'password.confirmed' => 'The password confirmation does not match.',

         'phone.required' => 'The phone field is required.',
         'phone.regex' => 'The phone number must contain only numbers.',

         'email.required' => 'The email field is required.',
         'email.email' => 'The email must be a valid email address.',
      ];
      $phone = str_contains($request->phone, '+88') ? $request->phone : "+88" . $request->phone;
      if ($request->verified_by == 'phone') {
         $rules['email'] = 'required|string|email|max:255|unique:users,email';
         $messages['email.unique'] = 'The Email has already been taken.';
      }

      $validator = Validator::make($request->all(), $rules, $messages);



      if ($request->verified_by == 'email') {
         $user = User::where('email', $request->email)->first();
         $email_or_phone = $request->email;
         if (User::where('phone', $phone)->first()) {
            return redirect()->route('user.auth.registration')->with('email_or_phone', $email_or_phone)->withErrors(['phone' => 'The Phone has already been taken.'])->withInput();
         }
      } else {
         $user = User::where('phone', $phone)->first();
         $email_or_phone = $phone;
      }
      if ($validator->fails()) {
         return redirect()->route('user.auth.registration')->with('email_or_phone', $email_or_phone)->withErrors($validator->errors())->withInput();
      }


      if ($user) {
         $user->phone = $phone;
         $user->email = $request->email;
         $user->name = $request->name;
         $user->password = Hash::make($request->password);
         $user->save();

         if (
            Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1']) ||
            Auth::guard('user')->attempt(['phone' => $phone, 'password' => $request->password, 'status' => '1'])
         ) {
            // dd('test');
            // if successful, then create laravel passport token and redirect to their intended location
            if ($user->can_login == 1) {
               $token = $user->createToken('userApiToken')->accessToken;
               Cookie::queue('access_token', $token, 4500);
               if (session()->has('redirect')) {
                  return redirect()->to(session('redirect'))->with('success', 'Welcome to Muslim Biye!');
               }
            //   return redirect()->route('user.dashboard')->with('success', 'Welcome to Muslim Biye!');
              return redirect()->route('user.edit_biodata.index')->with('success', 'Welcome to Muslim Biye!');
            } else {
               // if unsuccessful, then redirect back to the login with the form data
               $errors = ['email' => 'Sorry! You Can Not Login'];
               Auth::guard('user')->logout();
               Cookie::forget('access_token');
               return redirect()->route('user.auth.registration')->with('email_or_phone', $email_or_phone)->withInput()->withErrors($errors);
            }
         }
         // if unsuccessful, then redirect back to the login with the form data
         $errors = ['unsuccessful' => 'Something Went Wrong'];
         return redirect()->route('user.auth.registration')->with('email_or_phone', $email_or_phone)->withErrors($errors)->withInput();
      } else {
         return redirect()->route('user.auth.login');
      }
   }


   public function logout()
   {
      Auth::guard('user')->logout();
      return redirect()->route('user.auth.login')->with('success', 'See You Soon!');
   }
}
