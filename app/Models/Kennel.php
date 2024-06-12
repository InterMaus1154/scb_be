<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Kennel extends Model
{
    use HasFactory;

    protected $guarded = ['kennel_id'];
    protected $primaryKey = 'kennel_id';

    public function kennelType()
    {
        return $this->belongsTo(KennelType::class, 'kennel_type_id', 'kennel_type_id');
    }

    /*
     * Count the number of available (available = here means usable, not available as no Booking on it) kennels
     * based on requested type
     * returns an integer (count of requested type)
     * */
    public static function countType(string $kennel_type)
    {
        $cacheKey = "kennel_count_". $kennel_type;

        /*
         * value is cached for a week for better performance
         * */
        return Cache::remember($cacheKey, now()->addDays(7), function () use ($kennel_type) {
          return self::whereHas('kennelType', fn($query) => $query->where('kennel_type_name', $kennel_type))->count();
        });
    }



}
