<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryPickupLocation extends Model {

    public $fillable = ["booking_id", "pickup_position", "location_name", "distance", "travel_time"];

}
