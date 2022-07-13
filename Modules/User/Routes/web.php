<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('users', 'UserController@index')->name('users.index');

//    Auth::routes(['verify' => true]);
});

Auth::routes(['verify' => true]);


