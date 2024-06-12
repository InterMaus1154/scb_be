<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Dog;
use App\Models\Staff;
use Auth;

/*
 * Helper class to determine ownership of an object
 * Ensuring customers can access only their dogs
 * */

trait AuthHelper
{

    private function currentUser(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }

    protected final function unauthorizedErrorResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'Unauthorised action for this type of ownership',
            'status' => 401
        ], 401);
    }

    protected function handleDogOwnership(Dog $dog, $callback)
    {
        if ($this->currentUser() instanceof Staff || $dog->customer_id == $this->currentUser()->customer_id) {
            return $callback();
        }

        return $this->unauthorizedErrorResponse();
    }

    protected function handleDogOwnershipCustomerId(Dog $dog, $customer_id, $callback)
    {
        if ($dog->customer_id == $customer_id) {
            return $callback();
        }

        return response()->json([
            'message' => 'This dog does not belong to this customer!',
            'status' => 400
        ], 400);
    }

    protected function handleRequestedCustomer($id, $callback)
    {
        if ($this->currentUser() instanceof Staff || $id == $this->currentUser()->customer_id) {
            return $callback();
        }

        return $this->unauthorizedErrorResponse();
    }

    protected function checkForStaffOwnership($id, $callback)
    {

        //manager can have access to any staff
        //a general can only access their things
        if ($this->currentUser() instanceof Staff && ($this->currentUser()->staff_id == $id || $this->currentUser()->role == "MANAGER")) {
            return $callback();
        }

        return $this->unauthorizedErrorResponse();
    }

    protected function handleBookingOwnership(Booking $booking, $callback)
    {
        //customer can only view their bookings, staff can view any
        if ($this->currentUser() instanceof Staff || $booking->customer_id == $this->currentUser()->customer_id) {
            return $callback();
        }

        return $this->unauthorizedErrorResponse();
    }


}
