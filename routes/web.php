<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
     'message' => 'Unauthorised action'
    ], 401);
});