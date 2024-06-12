<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class StaffResource extends JsonResource
{
    use FormatDate;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            /*basic info about staff, without auth*/
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'joinedAt' => Carbon::parse($this->joined_at)->year,
            'role' => Str::ucfirst(Str::lower($this->role)),
            'personal' => $this->personal,
            /*admin required to access*/
            $this->mergeWhen(
                $request->routeIs('admin.*') || $request->routeIs('auth.login.staff'), [
                    'staffId' => $this->staff_id,
                    'employeeNumber' => $this->employee_number,
                    'dateOfBirth' => $this->formatDateOnly($this->date_of_birth),
                    'email' => $this->email,
                    'phoneNumber' => $this->phone_number,
                    'addressLineFirst' => $this->address_line_first,
                    'addressLineSecond' => $this->address_line_second,
                    'city' => $this->city,
                    'postcode' => $this->postcode,
                    'county' => $this->county,
                    'gender' => $this->gender,
                    'role' => $this->role,
                    'createdAt' => $this->formatDateTime($this->created_at)
                ]
            )
        ];
    }
}
