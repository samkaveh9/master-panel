<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/user/{user}/info', 'UserController@info')->name('user.info');
    Route::put('users/user/{user}/info', 'UserController@storeInfo')->name('user.store.info');
    Route::put('user/{user}/store/profile', 'UserController@userImageStore')->name('user.store.profile');
//    Auth::routes(['verify' => true]);
});

Auth::routes(['verify' => true]);


