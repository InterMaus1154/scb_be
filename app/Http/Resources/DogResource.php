<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DogResource extends JsonResource
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
            'dogId' => $this->dog_id,
            'customerId' => $this->customer_id,
            'callerName' => $this->caller_name,
            'officialName' => $this->official_name,
            'breed' => $this->breed,
            'dateOfBirth' => $this->date_of_birth,
            'chipNumber' => $this->chip_number,
            'vetName' => $this->vet_name,
            'lastFleaTreatmentDate' => $this->formatDateOnly($this->last_flea_treatment_date),
            'nextFleaTreatmentDate' => $this->formatDateOnly($this->next_flea_treatment_date),
            'lastVaccinationDate' => $this->formatDateOnly($this->last_vaccination_date),
            'nextVaccinationDate' => $this->formatDateOnly($this->next_vaccination_date),
            'passportNumber' => $this->passport_number,
            'emergencyPhoneNumber' => $this->emergency_phone_number,
            'favouriteFood' => $this->favourite_food,
            'other' => $this->other,
            'createdAt' => $this->formatDateTime($this->created_at)
        ];
    }
}
