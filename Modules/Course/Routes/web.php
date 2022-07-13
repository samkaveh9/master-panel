<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::prefix('courses')->resource('courses', 'CourseController');
    Route::prefix('tags')->resource('tags', 'TagController');
    Route::prefix('teachers')->resource('teachers', 'TeacherController');
});
