<?php

namespace App\Http\Controllers;

use App\Http\Requests\Staff\UpdateStaffRequest;
use App\Http\Resources\StaffBasicCollection;
use App\Http\Resources\StaffBasicResource;
use App\Http\Resources\StaffResource;
use App\Http\Resources\StaffSensitiveCollection;
use App\Models\Staff;

class StaffController extends Controller
{

    use AuthHelper;

    /**
     * Display a listing of the resource.
     */
    //display all staff
    public function index()
    {
        return StaffResource::collection(Staff::paginate());
    }

    //display requested staff
    public function showStaff(Staff $staff)
    {
        return new StaffResource($staff);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        return $this->checkForStaffOwnership($staff->id, function () use ($request, $staff) {
            if ($staff->update($request->all())) {
                return response()->json([
                    'message' => 'Staff updated',
                    'status' => 201,
                    'staff' => new StaffResource($staff)
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Internal error',
                    'status' => 500
                ], 500);
            }
        });


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //manager can delete any, other staff can only their own
        return $this->checkForStaffOwnership($staff->id, function() use($staff){
            $staff->delete();
            return response()->json([
               'message' => 'Staff deleted',
               'status' => 201,
            ], 201);
        });
    }
}
