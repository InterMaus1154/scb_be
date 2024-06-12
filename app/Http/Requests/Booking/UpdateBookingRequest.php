<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bookingStartDate' => 'required|date|date_format:Y-m-d',
            'bookingEndDate' => 'required|date|date_format:Y-m-d|after_or_equal:bookingStartDate',
            'feedingFreq' => ['required', Rule::in(['1', '2', '3', '4', 'SPECIAL'])],
            'kennelTypeId' => ['required', Rule::exists('kennel_types', 'kennel_type_id')],
            'specialFeeding' => ['nullable', 'string', Rule::requiredIf(function(){
                return $this->feedingFreq == "SPECIAL";
            })],
            'foodTypeId' => ['required', Rule::exists('food_types', 'food_type_id')],
            'foodTypeSpecial' => ['nullable', 'string', Rule::requiredIf(function(){
                return $this->foodTypeId == 5;
            })],
            'message' => 'nullable|string'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'booking_start_date' => $this->bookingStartDate,
            'booking_end_date' => $this->bookingEndDate,
            'feeding_freq' => $this->feedingFreq,
            'kennel_type_id' => $this->kennelTypeId,
            'special_feeding' => $this->specialFeeding,
            'food_type_id' => $this->foodTypeId,
            'food_type_special' => $this->foodTypeSpecial
        ]);
    }

    public function messages(): array
    {
        return [
            '*.required' => 'One of the required fields is missing',
            '*.date' => 'Must be a valid date',
            '*.date_format' => 'Must be a date in a format of YYYY-MM-DD',
            '*.after_or_equal' => 'End date must be after the start date of the booking',
            'feedingFreq.in' => 'Invalid value was given. Valid values are 1, 2, 3, 4 or SPECIAL',
            'specialFeeding.required_if' => 'This value is required if the feeding frequency special requested'
        ];
    }
}
