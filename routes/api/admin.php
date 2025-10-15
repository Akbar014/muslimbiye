<?php



// Only Admin Access

Route::group(['middleware' => ['auth:admin_api']], function () {
    Route::get('users/all', 'UserApiController@index');
});
