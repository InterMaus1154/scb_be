<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'customer' prefix from provider
 * provides necessary interaction with customer endpoints*
 * */

//protected routes
//routes for customer endpoints
Route::group(['middleware' => 'auth:sanctum', 'controller' => \App\Http\Controllers\CustomerController::class], function () {
    /*
     * Customer can only edit their own profile and view their own dogs
     * */

    /*--- getting all customers is permitted by staff only, handled in api.admin ---*/

    //get a specific customer by id
    Route::get('/{customer}', ['uses' => 'showCustomer'])->name('customer.show.id');

    //upload new customer
    //aka register, handled by auth controller

    //update existing customer
    Route::put('/update/{customer}', ['uses' => 'update'])->name('customer.update.id');

    //delete existing customer
    Route::delete('/delete/{customer}', ['uses' => 'destroy'])->name('customer.delete.id');

    //show customer dogs
    Route::get('/{customer}/dogs', ['uses' => 'showDogs'])->name('customer.show.dogs');

    //show customer bookings
    Route::get('/{customer}/bookings', ['uses' => 'showBookings'])->name('customer.show.bookings');

});
