<?php

use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\PermissionController;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('permissions', 'PermissionController');
});
