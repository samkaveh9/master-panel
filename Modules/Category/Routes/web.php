<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('categories', 'CategoryController');
});
