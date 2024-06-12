<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

/*
 * Dog model
 * Dogs that are to stay at the hotel
 * */

class Dog extends Model
{
    use HasFactory;

    protected $guarded = ['dog_id'];
    protected $primaryKey = 'dog_id';

    /*
     * One pet has one customer (here owner)
     * */
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class, 'dog_id', 'dog_id');
    }
}
