<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\DogResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    use AuthHelper;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show all customers
        return CustomerResource::collection(Customer::paginate());
    }

    //show only customer by requested id
    public function showCustomer(Customer $customer)
    {
        return $this->handleRequestedCustomer($customer->customer_id, fn() => new CustomerResource($customer));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        return $this->handleRequestedCustomer($customer->customer_id, function () use ($customer, $request) {
            if ($customer->update($request->all())) {
                return response()->json([
                    'message' => 'Customer has been updated',
                    'status' => 201,
                    'customer' => new CustomerResource($customer)
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Internal error',
                    'status' => 500
                ], 500);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        return $this->handleRequestedCustomer($customer->customer_id, function () use ($customer) {
            //delete customer dogs if customer account is deleted
            $customer->dogs()->delete();
            $customer->delete();
            return response()->json([
                'message' => 'Customer successfully deleted',
                'status' => 201
            ], 201);
        });
    }

    //show dogs of the customer
    public function showDogs(Customer $customer)
    {
        return $this->handleRequestedCustomer($customer->customer_id, function () use ($customer) {
            return DogResource::collection($customer->dogs()->paginate());
        });
    }

    //show bookings of the customer
    public function showBookings(Customer $customer)
    {
        return $this->handleRequestedCustomer($customer->customer_id, fn() => BookingResource::collection($customer->bookings->load('kennelType')));
    }

}
