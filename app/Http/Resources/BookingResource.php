<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    use FormatDate;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'bookingId' => $this->booking_id,
            'customerId' => $this->customer_id,
            'dogId' => $this->dog_id,
            'dogName' => $this->dog->caller_name,
            'bookingStartDate' => $this->formatDateOnly($this->booking_start_date),
            'bookingEndDate' => $this->formatDateOnly($this->booking_end_date),
            'kennelTypeId' => $this->kennel_type_id,
            'kennelTypeName' => $this->kennelType->kennel_type_name,
            'foodTypeId' => $this->food_type_id,
            'foodTypeName' => $this->foodType->food_type_name,
            'foodTypeSpecial' => $this->when($this->food_type_id != 5, null, $this->food_type_special),
            'message' => $this->message,
            'status' => $this->status,
            'feedingFreq' => $this->feeding_freq,
            'specialFeeding' => $this->special_feeding,
            'createdAt' => $this->formatDateTime($this->created_at)
        ];
    }
}
