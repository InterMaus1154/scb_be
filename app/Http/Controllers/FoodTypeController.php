<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodType\StoreFoodTypeRequest;
use App\Http\Requests\FoodType\UpdateFoodTypeRequest;
use App\Http\Resources\FoodTypeResource;
use App\Models\FoodType;

class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FoodTypeResource::collection(FoodType::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodType $foodType)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodTypeRequest $request, FoodType $foodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodType $foodType)
    {
        //
    }
}
