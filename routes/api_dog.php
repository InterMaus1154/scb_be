<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * API routes
 * with 'dog' prefix from provider
 * provides necessary interaction with dog endpoints*
 * */

//protected routes
//routes for dog endpoints
Route::group(['middleware' => 'auth:sanctum', 'controller' => \App\Http\Controllers\DogController::class], function () {
    /*
     * Staff can upload, delete, or edit any dog
     * Customers only can take action on their own dogs
     * */

    /*--- getting all dogs is permitted by staff only, handled in api.admin ---*/

    //get a specific dog by id
    Route::get('/{dog}', ['uses' => 'showDog'])->name('dog.show.id');

    //upload new dog
    Route::post('/upload', ['uses' => 'store'])->name('dog.upload');

    //update existing dog
    Route::put('/update/{dog}', ['uses' => 'update'])->name('dog.update.id');

    //delete existing dog
    Route::delete('/delete/{dog}', ['uses' => 'destroy'])->name('dog.delete.id');
});
