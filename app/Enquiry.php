<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FranchiseeTraits;

class Enquiry extends Model {

    use SoftDeletes;
    use FranchiseeTraits;

    public $table = "enquiry";
    public $fillable = [
        "driver_id", "repeat_type", "order_id", "users_id", "franchisees_id", "trip_status", "client_id", "note", "booking_time", "repeat_booking_time", "repeat_booking_endtime", "base_location", "drop_location", "outward_companion", "outward_waiting", "journey_type", "journey_return_date", "return_companion", "return_waiting", "long_return", "base_return", "drop_off_to_base", "drop_off_to_base_time", "comfort_break", "return_comfort_break", "total_distance", "total_duration", "total_price", "custom_price", "final_price", "invoice_price", "paying_bill", "who_paying_bill", "payment_clientid", "payment_mode", "payment_status", "invoiced",
    ];

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function client() {
        return $this->belongsTo('App\Client', 'client_id');
    }
    public function driver() {
        return $this->hasOne('App\BookingVehicle', 'booking_id');
    }
    public function bookingDetails() {
        return $this->hasOne('App\BookingDetails', 'booking_id');
    }

    public function pickupLocation() {
        return $this->hasMany('App\EnquiryPickupLocation', 'booking_id')
                        ->where('pickup_position', "!=", '99');
    }

    public function dropLocation() {
        return $this->hasOne('App\EnquiryPickupLocation', 'booking_id')
                        ->where('pickup_position', '99');
    }

    public function getPriceAttribute() {
        return $this->custom_price ? $this->custom_price : $this->total_price;
    }

    public function getPickupAttribute() {
        $locations = "";
        foreach ($this->pickupLocation as $key => $pickup) {
            $locations .= ( $key + 1) . ". " . $pickup->location_name . "<br>";
        }
        return $locations;
    }

    public function getLocation($position = 1) {
        $currentLocation = false;
        foreach ($this->pickupLocation as $key => $pickup) {
            if ($position == $pickup->pickup_position) {
                $currentLocation = $pickup;
            }
        }
        if ($currentLocation) {
            return $currentLocation;
        } else {
            
        }
    }

    public function getTypeAttribute() {
        return $this->journey_type == 2 ? "Return" : "On Way";
    }

    public function getStatusAttribute() {
        if ($this->trip_status) {
            if ($this->trip_status == 1) {
                return "<span class='label label-sm label-success'>Trip Start</span>";
            } else if ($this->trip_status == 2) {
                return "<span class='label label-sm label-success'> Trip Complete </span>";
             } else if ($this->trip_status == 4) {
                return "<span class='label label-sm label-warning'>Cancel</span>";
            } else {
                return "<span class='label label-sm label-warning'> Breakdown</span>";
            }
        } else {
            if ($this->driver) {
                if ($this->driver->status == 1) {
                    return "<span class='label label-sm label-success'> Accept </span>";
                } else if ($this->driver->status == 2) {
                    return "<span class='label label-sm label-danger'> Reject </span>";
                } else {
                    return "<span class='label label-sm label-warning'> Wait for Response </span>";
                }
            } else {
                return "<span class='label label-sm label-info'>Driver Not allocation </span>";
            }
        }
    }

    public function getAllowDriverChageAttribute() {
        if ($this->driver) {
            if ($this->driver->status == 1) {
                return false;
            }
        }
        return true;
    }

}
