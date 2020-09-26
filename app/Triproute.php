<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Triproute extends Model
{
    protected $fillable = [
        "id", "booking_id", "lat", "lng","travel_time", 
    ];
}
