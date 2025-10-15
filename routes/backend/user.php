<?php


use App\Http\Controllers\Backend\User\BiodataController;
use App\Http\Controllers\Backend\User\BkashPaymentController;
use App\Http\Controllers\Backend\User\FavouriteController;
use App\Http\Controllers\Backend\User\UserDashboardController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

Route::get('/divisions', [LocationController::class, 'getDivisions']);
Route::get('/districts/{division_id}', [LocationController::class, 'getDistricts']);
Route::get('/upazilas/{district_id}', [LocationController::class, 'getUpazilas']);

Route::group(
  [
    'prefix' => 'edit_biodata',
    'as' => 'edit_biodata.',
    'middleware' => 'lang'
  ],
  function () {
    Route::get('/', [BiodataController::class, 'index'])->name('index');
    Route::post('/biodata', [BiodataController::class, 'biodata'])->name('biodata');
    Route::post('/general', [BiodataController::class, 'general'])->name('general');
    Route::post('/address', [BiodataController::class, 'address'])->name('address');
    Route::post('/education', [BiodataController::class, 'education'])->name('education');
    Route::post('/family', [BiodataController::class, 'family'])->name('family');
    Route::post('/personal', [BiodataController::class, 'personal'])->name('personal');
    Route::post('/professional', [BiodataController::class, 'professional'])->name('professional');
    Route::post('/marrage', [BiodataController::class, 'marrage'])->name('marrage');
    Route::post('/expected', [BiodataController::class, 'expected'])->name('expected');
    Route::post('/commitment', [BiodataController::class, 'commitment'])->name('commitment');
    Route::post('/contact', [BiodataController::class, 'contact'])->name('contact');
  }
);

Route::get('/my_biodata', [UserDashboardController::class, 'my_biodata'])->name('my_biodata');
Route::get('/favourite', [UserDashboardController::class, 'favourite'])->name('favourite');
Route::get('/my_purchases', [UserDashboardController::class, 'my_purchases'])->name('my_purchases');
Route::get('/settings', [UserDashboardController::class, 'settings'])->name('settings');
Route::post('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');

Route::get('/delete_biodata', [UserDashboardController::class, 'delete_biodata_page'])->name('delete_biodata_page');
Route::post('/delete_biodata', [UserDashboardController::class, 'delete_biodata'])->name('delete_biodata');

Route::get('/buy_connection', [UserDashboardController::class, 'buy_connection'])->name('buy_connection');
Route::get('/connection/{id}', [UserDashboardController::class, 'connection'])->name('connection');
Route::get('/use_connection/{id}', [UserDashboardController::class, 'use_connection'])->name('use_connection');



Route::post('/connection_buy_bkash/{id}', [UserDashboardController::class, 'connection_buy_bkash'])->name('connection_buy_bkash');
Route::get('/connection_bkash/callback', [UserDashboardController::class, 'bkash_callback'])->name('bkash_callback');










Route::post('/connection_buy_nagad/{id}', [UserDashboardController::class, 'connection_buy_nagad'])->name('connection_buy_nagad');

Route::get('/bkash/callback', [BkashPaymentController::class, 'callback'])->name('bkash.callback');
Route::post('/bkash/execute-payment', [BkashPaymentController::class, 'executePayment'])->name('bkash.execute');

Route::post("/favourite/update", [FavouriteController::class, 'update'])->name('favourite.update');
Route::post("/favourite/delete", [FavouriteController::class, 'destroy'])->name('favourite.delete');

Route::post("/biodata_report/{id}", [UserDashboardController::class, 'biodata_report'])->name('biodata_report');

Route::post('/apply_coupon', [UserDashboardController::class, 'apply_coupon'])->name('apply_coupon');