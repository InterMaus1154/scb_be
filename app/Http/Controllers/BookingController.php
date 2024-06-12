<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\FormatDate;
use App\Models\Booking;
use App\Models\Dog;
use App\Models\KennelType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use AuthHelper, FormatDate;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(Booking::paginate());
    }

    //check for available types based on date and requested type
    //used in both store and update
    private function isTypeAvailableForStart(Request $request): bool
    {

        //get the kennel type id
        $kennel_type_id = $request->input('kennel_type_id');

        //get the requested kennel type name
        $kennel_type_name = KennelType::where('kennel_type_id', $kennel_type_id)->first()->kennel_type_name;

        //get the start date of the booking
        $booking_start_date = $request->input('booking_start_date');

        //get all available types for that date
        $types = KennelType::availableKennelTypes($booking_start_date);

        if (!($types->contains('kennel_type_name', '=', $kennel_type_name))) {
            return false;
        }

        return true;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //Booking can only be made by a staff or a customer for their own dog
        //customerId and dogId must match (relationship wise)
        $dog_id = $request->input('dog_id');

        //if there are other open Booking with this dog, cancel process
        $booking = Booking::where('dog_id', $dog_id)->where('status', 'OPEN')->first();
        if ($booking) {
            return response()->json([
                'message' => 'There is another open Booking for the requested dog',
                'status' => 422
            ], 422);
        }

        //check dog vaccination date, if more than a year, Booking can't be made
        $dog = Dog::where('dog_id', $dog_id)->first();
        $start_date = Carbon::parse($request->input("booking_start_date"));
        if ($start_date->diffInDays($dog->last_vaccination_date) > 366) {
            return response()->json([
                'message' => 'You cannot book for this dog, as this dog had their vaccination more than 12 months ago on the start of its stay',
                'status' => 400
            ], 400);
        }

        //check if the requested kennel type is available or not
        //should be handled by frontend as well, but as a precaution
        if (!($this->isTypeAvailableForStart($request))) {
            return response()->json([
                'message' => 'The requested kennel type is not available for this date!',
                'status' => 422
            ], 422);
        };

        //retrieving customer id from input
        $customer_id = $request->input('customer_id');

        //first check if dog belongs to the requested customer
        //cant book if the requested customer do not own the dog
        return $this->handleDogOwnershipCustomerId($dog, $customer_id, function () use ($dog, $request) {
            //check if Booking is made by staff or the owner
            return $this->handleDogOwnership($dog, function () use ($request) {
                $booking = Booking::create($request->all());
                $booking = $booking->refresh();
                return response()->json([
                    'message' => 'Booking created',
                    'status' => 201,
                    'booking' => new BookingResource($booking)
                ], 201);
            });
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return $this->handleBookingOwnership($booking, fn() => new BookingResource($booking));
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(UpdateBookingRequest $request, Booking $booking)
    {
        //check if the requested kennel type is available or not
        //should be handled by frontend as well, but as a precaution
        if (!($this->isTypeAvailableForStart($request))) {
            return response()->json([
                'message' => 'The requested kennel type is not available for this date!',
                'status' => 422
            ], 422);
        };

        return $this->handleBookingOwnership($booking, function () use ($booking, $request) {
            //Booking can only be updated if Booking start date is more than in a day
            if (Carbon::now()->diffInHours($this->formatDateOnly($booking->booking_start_date)) < 24) {
                return response()->json([
                    'message' => 'You cannot change a Booking within 24 hours',
                    'status' => 400
                ], 400);
            }
            if ($booking->update($request->all())) {
                return response()->json([
                    'message' => 'Booking successfully updated',
                    'status' => 201,
                    'booking' => new BookingResource($booking->refresh())
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Internal error, try again later',
                    'status' => 500
                ], 500);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Booking $booking)
    {
        return $this->handleBookingOwnership($booking, function () use ($booking) {
            $booking->delete();
            return response()->json([
                'message' => 'Booking has been successfully deleted',
                'status' => 201
            ], 201);
        });
    }
}
