<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//protected routes
//routes for kennel endpoints
Route::group(['middleware' => 'auth:sanctum', 'controller' => \App\Http\Controllers\KennelController::class], function () {


    //get available kennel types for the requested date
    Route::post('/available-types', ['uses' => 'availableKennelTypes']);
});
