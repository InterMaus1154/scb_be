<?php

namespace App\Http\Requests\Dog;

use Illuminate\Foundation\Http\FormRequest;

class StoreDogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerId' => 'required',
            'callerName' => 'required|string|max:50',
            'officialName' => 'nullable|string|max:100',
            'breed' => 'required|string|max:50',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
            'chipNumber' => 'required|string|max:20',
            'vetName' => 'required|string|max:75',
            'lastFleaTreatmentDate' => 'required|date|date_format:Y-m-d',
            'nextFleaTreatmentDate' => 'nullable|date|date_format:Y-m-d',
            'lastVaccinationDate' => 'required|date|date_format:Y-m-d',
            'nextVaccinationDate' => 'nullable|date|date_format:Y-m-d',
            'passportNumber' => 'nullable|string|max:30',
            'favouriteFood' => 'nullable|max:120',
            'emergencyPhoneNumber' => 'required|string|max:20',
            'other' => 'nullable|string'
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'caller_name' => $this->callerName,
            'official_name' => $this->officialName,
            'date_of_birth' => $this->dateOfBirth,
            'chip_number' => $this->chipNumber,
            'customer_id' => $this->customerId,
            'vet_name' => $this->vetName,
            'last_flea_treatment_date' => $this->lastFleaTreatmentDate,
            'next_flea_treatment_date' => $this->nextFleaTreatmentDate,
            'last_vaccination_date' => $this->lastVaccinationDate,
            'next_vaccination_date' => $this->nextVaccinationDate,
            'passport_number' => $this->passportNumber,
            'favourite_food' => $this->favouriteFood,
            'emergency_phone_number' => $this->emergencyPhoneNumber
        ]);
    }

    public function messages(): array
    {
        return [
            '*.required' => 'One of the required fields is missing',
            '*.date' => 'Field must be a valid date',
            '*.date_format' => 'Field must be a valid date in format of YYYY-MM-DD',
            '*.max' => 'Character limit exceeded'
        ];
    }
}
