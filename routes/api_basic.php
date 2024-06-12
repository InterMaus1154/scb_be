<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'basic' prefix from provider
 * can be accessed without authentication
 * limit is rated for 30 for an hour by ip
 *
 * */


//unauthenticated basic routes
Route::group([], function () {
    //api test route
    Route::post('/test', fn() => response()->json([
        'message' => 'API is running'
    ], 200))->name('basic.test');

    //get basic staff data - for about page for frontend
    Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'index'])->name('basic.staff');
});
