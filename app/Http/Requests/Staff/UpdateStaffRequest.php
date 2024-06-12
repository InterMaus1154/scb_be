<?php

namespace App\Http\Requests\Staff;

use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        return $user instanceof Staff;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'personal' => 'nullable',
            'phoneNumber' => 'required|string',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
            'addressLineFirst' => 'required|string',
            'addressLineSecond' => 'nullable',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'county' => 'nullable',
            'gender' => 'required|in:MALE,FEMALE,OTHER,NA'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone_number' => $this->phoneNumber,
            'date_of_birth' => $this->dateOfBirth,
            'address_line_first' => $this->addressLineFirst,
            'address_line_second' => $this->addressLineSecond
        ]);
    }

    public function messages()
    {
        return [
            '*.required' => 'One of the required fields is missing',
            'dateOfBirth.date' => 'Date of birth must be a valid date',
            'dateOfBirth.date_format' => 'Date of birth must be in a format of YYYY-MM-DD',
            'gender.in' => 'Gender must be male, female, other or na'
        ];
    }




}
