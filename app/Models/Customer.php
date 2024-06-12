<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/*
 * Customer model
 * */

class Customer extends AuthModel
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $guarded = ['customer_id'];


    /*
     * One customer has many dogs
     * */
    public function dogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Dog::class, 'customer_id', 'customer_id');
    }

    /*
     * One customer has many bookings
     * */
    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class, 'customer_id', 'customer_id');
    }

}
