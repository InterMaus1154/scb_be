<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => "required|email|unique:App\Models\Customer|max:120",
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phoneNumber' => 'required|string|max:20',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
            'gender' => 'required|in:MALE,FEMALE,OTHER,NA',
            'addressLineFirst' => 'required|string|max:75',
            'addressLineSecond' => 'nullable|string|max:75',
            'city' => 'required|string|max:50',
            'postcode' => 'required|string|max:15',
            'county' => 'nullable|string|max:50',
            'password' => 'required|string|min:8'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone_number' => $this->phoneNumber,
            'date_of_birth' => $this->dateOfBirth,
            'address_line_first' => $this->addressLineFirst,
            'address_line_second' => $this->addressLineSecond,
        ]);
    }

    public function messages(): array
    {
        return [
            'email.unique' => "The email already registered!",
            '*.required' => 'One of the required fields is missing!',
            'dateOfBirth.date' => 'Date of birth must be a valid date',
            'dateOfBirth.date_format' => 'Date of birth must be in a format of YYYY-MM-DD',
            'gender.in' => 'Gender must be MALE, FEMALE, OTHER or NA',
            '*.max' => 'Exceeded character limit',
            'password.min' => 'Password must be at least 8 characters long!'
        ];
    }
}
