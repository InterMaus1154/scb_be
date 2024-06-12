<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dog\StoreDogRequest;
use App\Http\Requests\Dog\UpdateDogRequest;
use App\Http\Resources\DogResource;
use App\Models\Booking;
use App\Models\Dog;

class DogController extends Controller
{
    use AuthHelper;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show all dogs
        return DogResource::collection(Dog::paginate());
    }

    /*
     * return dog by id
     * */
    public function showDog(Dog $dog)
    {
        return $this->handleDogOwnership($dog, fn() => new DogResource($dog));
    }

    /*
     * delete a specific dog by id
     *
     * */
    public function destroy(Dog $dog)
    {
        return $this->handleDogOwnership($dog, function () use ($dog) {
            Booking::where('dog_id', $dog->dog_id)->delete();
            $dog->delete();
            return response()->json([
                'message' => 'Dog deleted',
                'status' => 201
            ], 201);
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDogRequest $request)
    {
        $requestedCustomerId = $request->get('customerId');
        return $this->handleRequestedCustomer($requestedCustomerId, function () use ($request) {
            $dog = Dog::create($request->all());
            return response()->json([
                'message' => 'New dog has been created',
                'dog' => new DogResource($dog)
            ], 201);
        });
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDogRequest $request, Dog $dog)
    {
        //only staff or customer owning the dog can update the dog
        return $this->handleDogOwnership($dog, function () use ($dog, $request) {
            if ($dog->update($request->all())) {
                return response()->json([
                    'message' => 'Dog has been successfully updated',
                    'status' => 201,
                    'dog' => new DogResource($dog)
                ]);
            } else {
                return response()->json([
                    'message' => 'Internal error',
                    'status' => 500
                ], 500);
            }
        });
    }
}
