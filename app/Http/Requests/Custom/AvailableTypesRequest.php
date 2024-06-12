<?php

namespace App\Http\Requests\Custom;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AvailableTypesRequest extends FormRequest
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
            'bookingStartDate' => 'required|date|date_format:Y-m-d'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'booking_start_date' => $this->bookingStartDate
        ]);
    }

    public function messages()
    {
        return [
            '*.required' => 'Field is required'
        ];

    }

}
