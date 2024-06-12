<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'auth' prefix
 * for authentication
 * used with AuthController
 *
 * */


//authentication routes
//prefix 'auth' comes from the RouteServiceProvider
Route::group(['controller' => \App\Http\Controllers\AuthController::class], function () {
    //customer login endpoint
    Route::post('/login/customer', ['uses' => 'loginCustomer'])->name('auth.login.customer');

    //staff login endpoint
    Route::post('/login/staff', ['uses' => 'loginStaff'])->name('auth.login.staff');

    //register customer
    Route::post('/register/customer', ['uses' => 'registerCustomer'])->name('auth.register.customer');

    //logout any logged in user
    Route::middleware('auth:sanctum')->post('/logout', ['uses' => 'App\Http\Controllers\AuthController@logout'])->name('auth.logout');
});
