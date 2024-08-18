<?php
Route::get('lang/{locale}',function ($locale){
    session(['locale' => $locale]);
    return redirect()->back();
});

Auth::routes(['register' => true]);


// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::resource('verifycode', 'Auth\VerifycodeController');
Route::post('verifycode/confirm-code', 'Auth\VerifycodeController@confirm_code');

Route::post('forgot_password', 'Auth\ForgotPassword@reset_password');

Route::resource('reset_password/{email}', 'Auth\ResetPasswordController')->only(['index'])->names([
    'index' => 'reset.index',
]);

Route::post('reset_password/update_password', 'Auth\ResetPasswordController@update_password')->name('reset.update');

Route::group(['middleware' => ['auth', 'approved']], function () {

    Route::resource('/', 'Dashboard\DashboardController')->names([
        'index' => 'dashboard.index'
    ]);

    Route::resource('/home', 'Home\HomeController');

    Route::resource('/postflow', 'Postflow\PostflowController');

    Route::get('/facebook-login', 'Social\FacebookController@go_to_facebook')->name('facebook-login');

    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');

    Route::resource('users', 'Admin\UsersController');

    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});


