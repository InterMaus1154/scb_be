<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    use FormatDate;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->dateFormat = "YYYY-MM-DD";

        return [
            'customerId' => $this->customer_id,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phoneNumber' => $this->phone_number,
            'dateOfBirth' => $this->formatDateOnly($this->date_of_birth),
            'gender' => $this->gender,
            'addressLineFirst' => $this->address_line_first,
            'addressLineSecond' => $this->address_line_second,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'county' => $this->county,
            'createdAt' => $this->formatDateTime($this->created_at),
            'dogs' => DogResource::collection($this->dogs),
            'bookings' => BookingResource::collection($this->bookings)
        ];
    }
}
