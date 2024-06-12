<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\StaffResource;
use App\Models\Customer;
use App\Models\Staff;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


/*
 * Controller for authorization
 * such as login, register, logout
 * to be done via bearer token
 * */

class AuthController extends Controller
{
    /*
     * login staff member
     * */
    public function loginStaff(Request $request)
    {

        /*
         * receive the details entered
         * */
        $credentials = $request->validate([
            'employee_number' => 'required',
            'password' => 'required'
        ]);

        /*
         * find user if exists with the employee number
         * */
        $staffUser = Staff::where('employee_number', $credentials['employee_number'])->first();
        if ($staffUser) {
            /*
             * check password hash matches
             * */
            if (Hash::check($credentials['password'], $staffUser->password)) {
                /*
                 * create the token and login user
                 * */
                $staffUser->tokens()->delete();
                $staffToken = $staffUser->createToken('staff_token')->plainTextToken;
                Auth::login($staffUser);

                return response()->json([
                    'message' => 'Login successful',
                    'token' => $staffToken,
                    'user' => new StaffResource($staffUser)
                ], 202);
            }

        }

        /*
         * If both condition above fails, this to be returned
         * */
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    /*
     * login customer
     * */
    public function loginCustomer(Request $request)
    {
        /*
         * receive the details entered
         * */
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        /*
         * find user if exists with the email
         * */
        $customerUser = Customer::whereEmail($credentials['email'])->first();
        if ($customerUser) {
            /*
             * check password hash matches
             * */
            if (Hash::check($credentials['password'], $customerUser->password)) {
                /*
                 * create the token and login user
                 * */
                $customerUser->tokens()->delete();
                $token = $customerUser->createToken('customer_token')->plainTextToken;
                Auth::login($customerUser);

                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token,
                    'user' => new CustomerResource($customerUser)
                ], 202);
            }
        }
        /*
         * If both condition above fails, this to be returned
         * */
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    /*
     * Register new customer
     * */
    public function registerCustomer(StoreCustomerRequest $request)
    {
        Customer::create($request->all());
        return response()->json([
            'message' => 'New account successfully created!'
        ], 201);
    }

    /*
     * logout any user
     * */
    public function logout()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'message' => 'User already logged out'
            ], 400);
        }
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }

    /*
     * logout all users
     * aka delete all tokens
     * only manager can do it
     *
     * */
    public function forceLogout(): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        if (!($user->role == "MANAGER")) {
            return response()->json([
                'message' => 'Forbidden request',
                'status' => 403
            ], 403);
        }
        try {
            DB::table('personal_access_tokens')->truncate();
            return response()->json([
                'message' => 'All tokens are deleted',
                'status' => 201
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'exceptionMessage' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
