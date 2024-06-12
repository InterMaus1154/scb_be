<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'admin' prefix from provider
 * can be accessed by authorised staff only
 *
 *
 * */

//protected routes
//that can only be performed by staff
Route::group(['middleware' => ['auth:sanctum', \App\Http\Middleware\StaffAuthMiddleware::class]], function () {

    //get all customers
    Route::get('/customers', ['uses' => 'App\Http\Controllers\CustomerController@index'])->name('admin.show.customers');

    //get all dogs
    Route::get('/dogs', ['uses' => 'App\Http\Controllers\DogController@index'])->name('admin.show.dogs');

    //get all bookings
    Route::get('/bookings', ['uses' => 'App\Http\Controllers\BookingController@index'])->name('admin.show.bookings');

    Route::group(['controller' => \App\Http\Controllers\StaffController::class], function(){

        //get all staff
        Route::get('/staffs', ['uses' => 'index'])->name('admin.show.staffs');

        //show staff by id
        Route::get('/staff/{staff}', ['uses' => 'showStaff'])->name('admin.show.staff.id');

        //update staff
        Route::put('/staff/update/{staff}', ['uses' => 'update'])->name('admin.update.staff.id');

        //delete staff
        Route::delete('/staff/delete/{staff}', ['uses' => 'destroy'])->name('admin.delete.staff.id');
    });

    //log out all currently logged in users
    Route::post('/force-out', ['uses' => 'App\Http\Controllers\AuthController@forceLogout'])->name('admin.logout.all');


});
