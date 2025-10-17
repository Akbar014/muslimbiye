<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\Admin\DatabaseReform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Backend


// Admin Auth
Route::prefix('admin_login')->group(function () {
    Route::get('login', [AdminLoginController::class, 'login'])->name('admin.auth.login');
    Route::post('login', [AdminLoginController::class, 'loginAdmin'])->name('admin.auth.loginAdmin');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.auth.logout');
    Route::get('logout', [AdminLoginController::class, 'logout']);
});



//forgot password
Route::controller(ForgotPasswordController::class)->prefix('/')->name('forgot.')->group(function () {
    Route::get('/forgot/password', 'forgotPasswordView')->name('password');
    Route::post('/forgot/password', 'forgotPasswordSend')->name('password.submit');

    //password reset form
    Route::get('/reset/password/{token}', 'resetPasswordView')->name('password.reset');
    Route::post('/reset/password', 'resetPassword')->name('password.reset.submit');
});

// Admin Dashborad
Route::group(
    
    [
        'namespace' => 'Backend\Admin',
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth:admin', 'check_if_user', 'hard_maintainance']
    ],
    function () {
        require base_path('routes/backend/admin.php');
    }
);

// user dashboard
Route::group(
    [
        'namespace' => 'Backend\Admin',
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => ['auth:user', 'hard_maintainance', 'lang']
    ],
    function () {
        require base_path('routes/backend/user.php');
    }
);

// User Auth
Route::prefix('user_login')->middleware('lang')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('user.auth.login');
    Route::post('login', [LoginController::class, 'loginUser'])->name('user.auth.loginUser');

    Route::get('otp', [LoginController::class, 'otp'])->name('user.auth.otpGet');
    Route::post('otp', [LoginController::class, 'otp'])->name('user.auth.otp');
    Route::get('registration', [LoginController::class, 'registration'])->name('user.auth.registration');
    Route::post('registration', [LoginController::class, 'registerUser'])->name('user.auth.registerUser');

    Route::post('existingUserLogin', [LoginController::class, 'existingUserLogin'])->name('user.auth.existingUserLogin');
    Route::get('logout', [LoginController::class, 'logout'])->name('user.auth.logout');
    // Route::get('logout', [LoginController::class, 'logout']);
});

// Route::middleware('lang')->group(function () {
//     Auth::routes();
// });



Route::post('/register/user', [RegisterController::class, 'UserRegister'])->name('UserRegister');

Route::get('/unavailable', function () {
    if (!env('HARD_MAINTENANCE_MODE', false)) {
        return redirect()->route('frontend.home');
    }
    return view('frontend.unavailable');
})->name('hard_unavailable');

if (env('APP_DEBUG', false)) {
    Route::get('/database_reform', [DatabaseReform::class, 'index'])->name('database_reform');

    Route::get('test/email', function () {
        $send_mail = 'test@gmail.com';
        dispatch(new App\Jobs\SendEmailJob($send_mail));
        dd('send mail successfully !!');
    });
}


// frontend
Route::group(
    [
        'namespace' => 'Frontend',
        'as' => 'frontend.',
        'middleware' => ['lang', 'hard_maintainance'],
    ],
    function () {
        require base_path('routes/frontend/frontend.php');
    }
);

// Route::get('/test', function () {
//     return sendSms('8801768999721', 'Hello! This is a test SMS using PHP.');
// });
