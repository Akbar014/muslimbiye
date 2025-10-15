<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function UserRegister(Request $request)
    {
            // Validate the form data
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                'phone' => ['required', 'max:20', 'unique:admins'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'gender' => ['required'],
            ]);
        $customerRegister = new Admin();
        $customerRegister->name = $request->name;
        $customerRegister->email = $request->email;
        $customerRegister->phone = $request->phone;
        $customerRegister->gender = $request->gender;
        $customerRegister->user_type = 11; // 11 for user
        $customerRegister->role_id = 11; // 11 for user
        $customerRegister->status = 1;
        $customerRegister->can_login = 1; // 10 for customer
        // dd($customerRegister);

        if($request->password === $request->password_confirmation){
            $customerRegister->password = Hash::make($request->password);
            $customerRegister->save();

             if ($customerRegister->role_id) {
                 $customerRegister->assignRole(11);
                 Auth::guard('admin')->login($customerRegister);
                return redirect()->back()->with('success', "Registered successfully! Enter email and password to login!");
            } else {
                 return 0;
             }
        } else {
            return redirect()->back()->with('error', "Password doesn't match!");
        }
    }
}
