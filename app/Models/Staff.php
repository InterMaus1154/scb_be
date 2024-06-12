<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Staff model
 * */

class Staff extends AuthModel
{
    use HasFactory;

    protected $guarded = ['staff_id'];
    protected $primaryKey = 'staff_id';
}
