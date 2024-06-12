<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'booking' prefix from provider
 * provides necessary interaction with Booking endpoints*
 * */

//protected routes
//routes for booking endpoints
Route::group(['middleware' => 'auth:sanctum', 'controller' => \App\Http\Controllers\BookingController::class], function () {

    //getting all bookings is staff only, handled in admin api

    /*
     * Customer can only make a Booking for their own dog
     * */

    //create a new Booking
    Route::post('/upload', ['uses' => 'store'])->name('booking.upload');

    //get a specific Booking by Booking id
    Route::get('/{booking}', ['uses' => 'show'])->name('booking.show.id');

    //update a Booking by id
    Route::put('/update/{booking}', ['uses' => 'update'])->name('booking.update.id');

    //delete a Booking by id
    Route::delete('/delete/{booking}', ['uses' => 'destroy'])->name('booking.delete.id');

});
