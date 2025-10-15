<?php

use App\Http\Controllers\Auth\ThirdPartLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Search\SearchController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biodata_details/{id}', 'HomeController@biodata_details')->name('biodata_details');

// Search
Route::post('/searchSubmit', 'Search\SearchController@searchSubmit')->name('searchSubmit');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/mission', 'PageController@mission')->name('mission');
Route::get('/vision', 'PageController@vision')->name('vision');
Route::get('/terms_of_service', 'PageController@tos')->name('tos');
Route::get('/admin_info', 'PageController@admin_info')->name('admin_info');


Route::get('auth/google', [ThirdPartLoginController::class, 'redirectToGoogle'])->name('googleLogin');

Route::get('customer/auth/google/callback', [ThirdPartLoginController::class, 'handleGoogleCallback'])->name('googleLoginCB');



Route::get('auth/facebook', [ThirdPartLoginController::class, 'redirectToFacebook'])->name('facebookLogin');
Route::get('auth/facebook/callback', [ThirdPartLoginController::class, 'handleFacebookCallback']);

Route::get('/privacy_policy', 'PageController@privacy_policy')->name('privacy_policy');
Route::get('/refund_policy', 'PageController@refund_policy')->name('refund_policy');
Route::get('/achievement', 'PageController@achievement')->name('achievement');

// Route::get('/success_stories', 'PageController@success')->name('success');
// Route::get('/success_story/{id}', 'PageController@successSingle')->name('successSingle');

// Route::get('/checkPhone', 'HomeController@checkPhone')->name('checkphone');
// Route::post('/addPhone', 'HomeController@addPhone')->name('addPhone');

Route::get('/faq', 'PageController@faq')->name('faq');
Route::get('/contact_us', 'PageController@contact_us')->name('contact_us');
Route::post('/contact_submission', 'PageController@contact_submission')->name('contact_submission');
Route::get('/about_us', 'PageController@about_us')->name('about_us');
Route::get('/guide', 'PageController@guide')->name('guide');


Route::group([
    'prefix' => 'lang',
], function () {

    Route::get('/{prefix}', function ($prefix) {
        if (in_array($prefix, ['en', 'bn'])) {
            session()->put('locale', $prefix);
            return back();
        } else {
            abort(404);
        }
    })->name('lang');
});
