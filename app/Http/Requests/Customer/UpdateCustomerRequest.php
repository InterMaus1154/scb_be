<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phoneNumber' => 'required|string|max:20',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
            'gender' => 'required|in:MALE,FEMALE,OTHER,NA',
            'addressLineFirst' => 'required|string|max:75',
            'addressLineSecond' => 'nullable|string|max:75',
            'city' => 'required|string|max:50',
            'postcode' => 'required|string|max:15',
            'county' => 'nullable|max:50'
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
            '*.required' => 'One of the required fields is missing!',
            'dateOfBirth.date' => 'Date of birth must be a valid date',
            'dateOfBirth.date_format' => 'Date of birth must be in a format of YYYY-MM-DD',
            'gender.in' => 'Gender must be MALE, FEMALE, OTHER or NA',
            '*.max' => 'Character limit exceeded'
        ];
    }
}
