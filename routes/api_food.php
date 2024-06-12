<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//protected routes
//routes for food endpoints
Route::group(['middleware' => 'auth:sanctum', 'controller' => \App\Http\Controllers\FoodTypeController::class], function () {

    //get all food types
    //cached
    Route::get('/available-types', ['uses' => 'index']);
});
