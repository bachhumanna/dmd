<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryDetails extends Model {
    public $table = "enquiry_details";
    public $fillable = [
         "booking_id", "outward_destination", "outward_waiting", "outward_companion", "outward_comfort_break", "outward_drop_off_to_base", "outward_pick_up_cost", "outward_vehicle_cost", "outward_driver_cost", "return_destination", "return_waiting", "return_companion", "return_comfort_break", "return_drop_off_to_base", "return_pick_up_cost", "return_vehicle_cost", "return_driver_cost"
    ];
}
