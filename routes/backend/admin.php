<?php

use App\Http\Controllers\Backend\Admin\BioDataController;
use App\Http\Controllers\Backend\Admin\BiodataReportController;
use App\Http\Controllers\Backend\Admin\ContactFormController;
use App\Http\Controllers\Backend\Admin\CouponController;
use App\Http\Controllers\Backend\Admin\FaqController;
use App\Http\Controllers\Backend\Admin\GuideController;
use App\Http\Controllers\Backend\Admin\PackagesController;
use App\Http\Controllers\Backend\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/biodata-stats', 'DashboardController@getBiodataStats')->name('biodata.stats');


Route::post('/admin/biodata/{biodata}/approve', 'BiodataStatusController@approve')->name('backend.admin.biodata.approve');
Route::post('/admin/biodata/{biodata}/postpone', 'BiodataStatusController@postpone')->name('backend.admin.biodata.postpone');
Route::delete('/admin/biodata/{biodata}', 'BiodataStatusController@destroy')->name('backend.admin.biodata.delete');
Route::get('/admin/biodata/{biodata}/edit', 'BiodataStatusController@edit')->name('backend.admin.biodata.edit');
Route::put('/admin/biodata/{id}', 'BiodataStatusController@update')->name('backend.admin.biodata.update');


// Admin
Route::get('/alladmin', 'AdminController@alladmin')->name('admin.index');
Route::get('/alladmin/get', 'AdminController@alladminGet')->name('alladmin.admin');
Route::get('/profile', 'AdminController@profile')->name('profile');
Route::get('/edit_profile', 'AdminController@edit')->name('edit');
Route::patch('/edit_profile', 'AdminController@update')->name('update');
Route::get('/change_password', 'AdminController@change_password')->name('password_change');
Route::patch('/change_password', 'AdminController@update_password')->name('change_password');



/* ===== Blog End =========== */


/* ===== Access Management Start =========== */
Route::resource('users', 'UserController');
Route::get('/allUser', 'UserController@getAll')->name('allUser.users');
Route::get('/allUserAdmin', 'UserController@allUserAdmin')->name('allUser.admin');
Route::get('/allUserAdminShow', 'UserController@allUserAdminShow')->name('allUser.admin.show');
Route::get('/export', 'UserController@export')->name('export');

Route::resource('permissions', 'PermissionController');
Route::get('/allPermissions', 'PermissionController@getAll')->name('allPermissions');

Route::resource('roles', 'RoleController');
Route::get('/allRoles', 'RoleController@getAll')->name('allRoles');

/* ===== Settings Start =========== */

// Settings Controller
Route::resource('settings', 'SettingsController');
Route::get('/allSettings', 'SettingsController@getAll')->name('allSettings');
Route::get('/page_content', 'SettingsController@page_content')->name('settings.page_content');
Route::post('/page_content/update', 'SettingsController@page_content_update')->name('settings.page_content_update');

/* ===== Settings End =========== */

/* ===== BioDataController Start =========== */

// BioDataController Controller
Route::get('/biodata/create', [BioDataController::class, 'create'])->name('biodata.create');
Route::post('/biodata/create', [BioDataController::class, 'biodata_store'])->name('biodata.store');

Route::post('/biodata/general', [BioDataController::class, 'general'])->name('biodata.general');
Route::post('/biodata/address', [BioDataController::class, 'address'])->name('biodata.address');
Route::post('/biodata/education', [BioDataController::class, 'education'])->name('biodata.education');
Route::post('/biodata/family', [BioDataController::class, 'family'])->name('biodata.family');
Route::post('/biodata/personal', [BioDataController::class, 'personal'])->name('biodata.personal');
Route::post('/biodata/professional', [BioDataController::class, 'professional'])->name('biodata.professional');
Route::post('/biodata/marrage', [BioDataController::class, 'marrage'])->name('biodata.marrage');
Route::post('/biodata/expected', [BioDataController::class, 'expected'])->name('biodata.expected');
Route::post('/biodata/commitment', [BioDataController::class, 'commitment'])->name('biodata.commitment');
Route::post('/biodata/contact', [BioDataController::class, 'contact'])->name('biodata.contact');



Route::get('/biodata/pending', [BioDataController::class, 'pending'])->name('biodata.pending');
Route::get('/biodata/approved', [BioDataController::class, 'approved'])->name('biodata.approved');
Route::get('/biodata/suspected', [BioDataController::class, 'suspected'])->name('biodata.suspected');
Route::get('/biodata/married', [BioDataController::class, 'married'])->name('biodata.married');
Route::get('/biodata/deleted', [BioDataController::class, 'deleted'])->name('biodata.deleted');
Route::get('/biodata/incomplete', [BioDataController::class, 'incomplete'])->name('biodata.incomplete');
Route::get('/biodata/all/{page}', [BioDataController::class, 'getAll'])->name('biodata.all');






Route::get('/biodata/request_pending', [BioDataController::class, 'request_pending'])->name('biodata.request_pending');
Route::get('/biodata/request_delete', [BioDataController::class, 'request_delete'])->name('biodata.request_delete');
Route::get('/biodata/my', [BioDataController::class, 'my_biodata'])->name('biodata.my_biodata');
Route::get('/biodata/my/biodata_pending', [BioDataController::class, 'my_biodata_pending'])->name('biodata.my_biodata_pending');

Route::get('/biodata/my/biodataPrint/{id}', [BioDataController::class, 'my_biodataPrint'])->name('biodata.my_biodataPrint');
Route::get('/biodata/approve', [BioDataController::class, 'ApproveIndex'])->name('biodata.ApproveIndex');
Route::get('/biodata/verify', [BioDataController::class, 'VerifyIndex'])->name('biodata.VerifyIndex');
Route::get('/biodata/data/request_pending', [BioDataController::class, 'request_pendingData'])->name('biodata.request_pendingData');
Route::get('/biodata/data/request_delete', [BioDataController::class, 'request_deleteData'])->name('biodata.request_deleteData');
Route::get('/biodata/data/allMyData', [BioDataController::class, 'allMyData'])->name('biodata.allMyData');
Route::get('/biodata/data/allMyDataPending', [BioDataController::class, 'allMyDataPending'])->name('biodata.allMyDataPending');
Route::get('/biodata/data/myDataEdit/{id}', [BioDataController::class, 'myDataEdit'])->name('biodata.myDataEdit');

Route::get('/biodata/data/approve', [BioDataController::class, 'approveData'])->name('biodata.approve');
Route::get('/biodata/data/verfiy', [BioDataController::class, 'VerifyData'])->name('biodata.verify');
Route::get('/biodata/data/trash', [BioDataController::class, 'trashData'])->name('biodata.trash');
Route::get('/biodata/data/my/trash', [BioDataController::class, 'UsertrashData'])->name('biodata.my_trash');
Route::get('/biodata/trash', [BioDataController::class, 'trashIndex'])->name('biodata.trashIndex');
Route::get('/biodata/user_trash', [BioDataController::class, 'trashUserIndex'])->name('biodata.trashUserIndex');
Route::delete('/biodata/destory/{id}', [BioDataController::class, 'destroy'])->name('biodata.destroy');
Route::get('/biodata/delete_modal/{id}', [BioDataController::class, 'delete_modal'])->name('biodata.delete_modal');
Route::delete('/biodata/softdestroy/{id}', [BioDataController::class, 'softdestroy'])->name('biodata.softdestroy');
Route::delete('/biodata/my/BiodataDistroy/{id}', [BioDataController::class, 'myBiodataDistroy'])->name('biodata.myBiodataDistroy');
Route::post('/biodata/approve/{id}', [BioDataController::class, 'approve']);
Route::post('/biodata/reverse/{id}', [BioDataController::class, 'reverse'])->name('biodata.reverse');
Route::get('/biodata/view/{id}', [BioDataController::class, 'view'])->name('biodata.view');
Route::get('/biodata/edit/{id}', [BioDataController::class, 'edit'])->name('biodata.edit');
Route::get('/biodata/edit_status/{id}', [BioDataController::class, 'edit_status'])->name('biodata.edit_status');
Route::post('/biodata/update_status/{id}', [BioDataController::class, 'update_status'])->name('biodata.update_status');
Route::post('/biodata/update/{id}', [BioDataController::class, 'update'])->name('biodata.update');
Route::get('/biodata/featured/{id}', [BioDataController::class, 'featured'])->name('biodata.featured');

/* ===== BioDataController End =========== */


Route::get('/transactions_history', [TransactionController::class, 'index'])->name('transactions_history.index');
Route::get('/transactions_history_list', [TransactionController::class, 'getAll'])->name('transactions_history.all');

Route::get('/contact_form', [ContactFormController::class, 'index'])->name('contact_form.index');
Route::get('/contact_form_list', [ContactFormController::class, 'getAll'])->name('contact_form.all');

Route::get('/biodata_report', [BiodataReportController::class, 'index'])->name('biodata_report.index');
Route::get('/biodata_report_list', [BiodataReportController::class, 'getAll'])->name('biodata_report.all');
Route::get('/biodata_report/{id}', [BiodataReportController::class, 'suspend'])->name('biodata_report.suspend');
Route::get('/biodata_report/{id}', [BiodataReportController::class, 'delete'])->name('biodata_report.delete');


Route::get('/packages/index', [PackagesController::class, 'index'])->name('packages.index');
Route::get('/packages/create', [PackagesController::class, 'create'])->name('packages.create');
Route::post('/packages/store/', [PackagesController::class, 'store'])->name('packages.store');
Route::get('/packages/edit/{id}', [PackagesController::class, 'edit'])->name('packages.edit');
Route::post('/packages/update/{id}', [PackagesController::class, 'update'])->name('packages.update');
Route::delete('/packages/destroy/{id}', [PackagesController::class, 'destroy'])->name('packages.destroy');
Route::get('packages_list', [PackagesController::class, 'getAll'])->name('packages.all');



Route::get('/faqs/index', [FaqController::class, 'index'])->name('faqs.index');
Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
Route::post('/faqs/store/', [FaqController::class, 'store'])->name('faqs.store');
Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->name('faqs.edit');
Route::post('/faqs/update/{id}', [FaqController::class, 'update'])->name('faqs.update');
Route::delete('/faqs/destroy/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');
Route::get('faqs_list', [FaqController::class, 'getAll'])->name('faqs.all');


Route::get('/guides/index', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
Route::post('/guides/store/', [GuideController::class, 'store'])->name('guides.store');
Route::get('/guides/edit/{id}', [GuideController::class, 'edit'])->name('guides.edit');
Route::post('/guides/update/{id}', [GuideController::class, 'update'])->name('guides.update');
Route::delete('/guides/destroy/{id}', [GuideController::class, 'destroy'])->name('guides.destroy');
Route::get('guides_list', [GuideController::class, 'getAll'])->name('guides.all');


Route::get('/coupons/index', [CouponController::class, 'index'])->name('coupons.index');
Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
Route::post('/coupons/store/', [CouponController::class, 'store'])->name('coupons.store');
Route::get('/coupons/edit/{id}', [CouponController::class, 'edit'])->name('coupons.edit');
Route::post('/coupons/update/{id}', [CouponController::class, 'update'])->name('coupons.update');
Route::delete('/coupons/destroy/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');
Route::get('coupons_list', [CouponController::class, 'getAll'])->name('coupons.all');