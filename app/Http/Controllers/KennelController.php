<?php

namespace App\Http\Controllers;

use App\Http\Requests\Custom\AvailableTypesRequest;
use App\Models\KennelType;

class KennelController extends Controller
{
    public function availableKennelTypes(AvailableTypesRequest $request)
    {
        return KennelType::availableKennelTypes($request->input('booking_start_date'));
    }
}
