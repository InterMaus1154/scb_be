<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KennelType extends Model
{
    use HasFactory;

    protected $primaryKey = 'kennel_type_id';

    public $timestamps = false;

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'kennel_type_id', 'kennel_type_id');
    }

    public function kennels()
    {
        return $this->hasMany(Kennel::class, 'kennel_type_id', 'kennel_type_id');
    }


    /*
     * returns the cached version of all kennel types
     * */
    public function scopeAllCached(Builder $query)
    {
        return cache()->remember('kennel_types_all', now()->addDays(7), fn() => $this->all());
    }

    /*
     * returns only the type id and type name, cached
     * */
    public function scopeAllMinimal(Builder $query)
    {
        return cache()->remember('kennel_types_minimal', now()->addDays(7), fn() => $this->all(['kennel_type_id', 'kennel_type_name']));
    }


    /*
     * Count the available kennel types based on the date
     * returns a collection of type id and type name
     *
     * */
    public static function availableKennelTypes(string $requested_booking_start_date)
    {

        //empty collection - will store the types
        $available_types = collect([]);

        //loop through all the types and store the available ones in a collection
        foreach (self::allMinimal() as $type) {
            //check if the available kennels of this type are greater than the already booked ones for the requested date
            if (Kennel::countType($type['kennel_type_name']) > Booking::whereIsOpenStartBeforeAfterByKennel($requested_booking_start_date, $type['kennel_type_name'])->count()) {
                $available_types->add($type);
            }
        }

        return $available_types;
    }

}
