<?php
Route::get('lang/{locale}',function ($locale){
    session(['locale' => $locale]);
    return redirect()->back();
});

Auth::routes(['register' => true]);

Route::post('tiktok-webhook', 'Social\SocialConnectorController@tikTokWebhook')->name('tiktok-webhook');

Route::post('facebook-datadelection-callback', 'Social\FacebookController@dataDelectionCallback')->name('facebook.datadelection_callback');
Route::post('facebook-dataprocess', 'Social\FacebookController@dataProcess')->name('facebook.dataprocess');

// Change Password Routes...
Route::get('change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change-password');
Route::patch('change-password', 'Auth\ChangePasswordController@changePassword')->name('auth.change-password');

Route::resource('verifycode', 'Auth\VerifycodeController');
Route::post('verifycode/confirm-code', 'Auth\VerifycodeController@confirm_code');

Route::post('forgot-password', 'Auth\ForgotPassword@reset_password');

Route::resource('privace-police', 'Privacy_Policy\PoliceController');

Route::resource('terms-condition', 'Privacy_Policy\TermsController');

Route::resource('reset-password/{email}', 'Auth\ResetPasswordController')->only(['index'])->names([
    'index' => 'reset.index',
]);

Route::post('reset-password/update-password', 'Auth\ResetPasswordController@update_password')->name('reset.update');

Route::get('submit-client', 'SubmitClient\ClientController@index')->name('submit.client');
Route::post('submit-clientdata', 'SubmitClient\ClientController@submitClient')->name('submit.clientdata');

Route::group(['middleware' => ['auth', 'approved']], function () {

    Route::resource('/', 'Dashboard\DashboardController')->names([
        'index' => 'dashboard.index'
    ]);

    Route::resource('home', 'Home\HomeController');

    Route::get('services', 'Services\ServiceController@index')->name('service.index');

    Route::get('overview-client', 'SubmitClient\OverviewClientController@index')->name('service.index');

    Route::resource('postflow', 'Postflow\PostflowController');
    Route::post('send-call-request', 'Postflow\PostflowController@sendCallRequest')->name('send.callrequest');
    Route::post('redirect-create-post', 'Postflow\PostflowController@redirectCreatePost')->name('postflow.redirect_create');
    Route::post('get-servertime', 'Postflow\PostflowController@getServerTime')->name('get.servertime');
    Route::get('meeting-callback', 'Postflow\PostflowController@meetingCallback')->name('meeting.callback');

    Route::get('facebook-login', 'Social\FacebookController@go_to_facebook')->name('facebook-login');
    Route::get('facebook-callback', 'Social\FacebookController@redirect_facebook')->name('redirect_facebook');

    Route::get('tiktok-login', 'Social\SocialConnectorController@connectTiktok')->name('tiktok-login');
    Route::get('tiktok-callback', 'Social\SocialConnectorController@redirectTiktok')->name('tiktok-callback');
    Route::post('tiktok-post', 'Social\SocialConnectorController@postToTikTok')->name('tiktok.post');
    Route::post('tiktok-schedule', 'Social\SocialConnectorController@scheduleTiktok')->name('tiktok.schedule');

    Route::post('social-disconnect', 'Social\SocialConnectorController@disconnectSocial')->name('social.disconnect');

    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');

    Route::resource('roles', 'Admin\RolesController');

    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');

    Route::resource('users', 'Admin\UsersController');

    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
