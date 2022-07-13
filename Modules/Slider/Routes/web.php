<?php

use \Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('slider', 'SliderController');
});
