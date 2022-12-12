<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Real Pc
    Route::delete('real-pcs/destroy', 'RealPcController@massDestroy')->name('real-pcs.massDestroy');
    Route::resource('real-pcs', 'RealPcController');

    // Remote Pc
    Route::delete('remote-pcs/destroy', 'RemotePcController@massDestroy')->name('remote-pcs.massDestroy');
    Route::resource('remote-pcs', 'RemotePcController');

    // Email
    Route::delete('emails/destroy', 'EmailController@massDestroy')->name('emails.massDestroy');
    Route::resource('emails', 'EmailController');

    // Skype
    Route::delete('skypes/destroy', 'SkypeController@massDestroy')->name('skypes.massDestroy');
    Route::resource('skypes', 'SkypeController');

    // Discord
    Route::delete('discords/destroy', 'DiscordController@massDestroy')->name('discords.massDestroy');
    Route::resource('discords', 'DiscordController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
