<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model {
    public $table = "booking_details";
    public $fillable = [
        "booking_id", "outward_destination", "outward_waiting", "outward_companion", "outward_comfort_break", "outward_drop_off_to_base", "outward_pick_up_cost", "outward_companion_cost","return_destination", "return_waiting", "return_companion", "return_comfort_break", "return_drop_off_to_base", "return_pick_up_cost","return_companion_time"
    ];
    
        public function bookingDetailsAll() {
        return $this->hasMany('App\Booking', 'booking_id');
    }
}
