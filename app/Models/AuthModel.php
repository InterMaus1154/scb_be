<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;

/*
 * Base model
 * To be inherited by models that are authenticatable
 * = customer, staff
 * */

abstract class AuthModel extends User
{
    use HasApiTokens, Notifiable;

    /*
     * mass assignment protected fields
     * preferably ID only for easier model creation
     * */
    protected $guarded = ['id'];

    /*
     * passwords should be stored in a hash format
     * */
    protected $casts = [
        'password' => 'hashed'
    ];

    /*
     * password should be hidden
     * */
    protected $hidden = [
        'password'
    ];

    /*
     * IMPORTANT!
     * TEMPORARY TOKEN
     * TO BE REMOVED IN FINAL PRODUCT
     * custom token
     * 10 chars long
     *
     * */
    public function createToken(string $name, array $abilities = ['*'], DateTimeInterface $expiresAt = null)
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'abilities' => $abilities,
            'token' => hash('sha256', $plainTextToken = Str::random(10)),
            'expires_at' => $expiresAt
        ]);
        return new NewAccessToken($token, $plainTextToken);
    }
}
