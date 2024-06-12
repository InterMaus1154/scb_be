<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['booking_id'];

    protected $primaryKey = 'booking_id';

    //customer relationship
    //one booking belongs to one customner
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    //dog relationship
    //one booking belongs to one dog
    public function dog(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dog::class, 'dog_id', 'dog_id');
    }

    //kennel type relationship
    //one booking belongs to one kennel type
    public function kennelType()
    {
        return $this->belongsTo(KennelType::class, 'kennel_type_id', 'kennel_type_id');
    }

    //food type relationship
    //one booking belongs to one food type
    public function foodType()
    {
        return $this->belongsTo(FoodType::class, 'food_type_id', 'food_type_id');
    }

    //load kennelType and foodType relationship by default
    protected $with = ['kennelType', 'foodType', 'dog'];

    public function scopeIsOpen(Builder $query): void
    {
        $query->where('status', 'OPEN');
    }

    public function scopeIsClosed(Builder $query): void
    {
        $query->where('status', 'CLOSED');
    }

    //get Booking by kennel type
    public function scopeByKennel(Builder $query, string $kennel_type)
    {
        $query->whereHas('kennelType', function($query) use($kennel_type){
            return $query->where('kennel_type_name', $kennel_type);
        });
    }

    //get the bookings, where the start is less equal and end date is greater than the requested date(new Booking start)
    public function scopeWhereStartBeforeAfter(Builder $query, string $requested_booking_start_date)
    {
        $requested_booking_start_date = Carbon::parse($requested_booking_start_date)->isoFormat("YYYY-MM-DD");

        $query->whereDate('booking_start_date', '<=', $requested_booking_start_date)
        ->whereDate('booking_end_date', '>', $requested_booking_start_date);
    }

    //return bookings which are open(active), start date is less equal and end date is greater than the requested date, and type = requested type
    public function scopeWhereIsOpenStartBeforeAfterByKennel(Builder $query, string $requested_booking_start_date, string $kennel_type)
    {
        $query->isOpen()->whereStartBeforeAfter($requested_booking_start_date)->byKennel($kennel_type);
    }

}
