<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FranchiseeTraits;
use OwenIt\Auditing\Contracts\Auditable;
use Kyslik\ColumnSortable\Sortable;

class Booking extends Model implements Auditable {

    use Sortable;
    use SoftDeletes;
    use FranchiseeTraits;
    use \OwenIt\Auditing\Auditable;

    public $table = "booking";
    public $fillable = [
        'vat_registered',
        'journey_return_date',
        'invoice_price',
        'repeat_type',
        "payment_clientid",
        "comfort_break",
        "return_comfort_break",
        "users_id",
        'who_paying_bill',
        'paying_bill',
        'drop_off_to_base_time',
        "note",
        "booking_time",
        "base_location",
        "drop_location",
        "outward_companion",
        "outward_waiting",
        "journey_type",
        "return_companion",
        "return_waiting",
        "long_return",
        "base_return",
        "drop_off_to_base",
        "total_distance",
        "total_duration",
        "total_price",
        "custom_price",
        "payment_mode",
        "repeat_booking_endtime",
        "companion_driver_companion",
        "booking_or_quotes",
        "companion_id",
        "quote_previous_status",
        'companion_time',
        'booking_source',
        'late_booking_reason',
        'advance_payment_amount'
    ];

    public $sortable = ["franchisees_id", "order_id", "client_id","booking_time","pickup","drop_location","driver_id","total_duration","total_price"];

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }


    public function companyInfo() {
        return $this->belongsTo('App\CompanyInfo', 'franchisees_id','franchisees_id');
    }

    public function client() {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function invoiceOverride() {
        return $this->belongsTo('App\BookingInvoiceOverride','group_invoice_id', 'id');
    }

    public function Drivername() {
        return $this->belongsTo('App\User', 'driver_id');
    }

    public function clientEmail() {
        return $this->belongsTo('App\Client', 'payment_clientid', 'id');
    }

    public function driver() {
        return $this->hasOne('App\BookingVehicle', 'booking_id');
    }

    public function bookingDetails() {
        return $this->hasOne('App\BookingDetails', 'booking_id');
    }

    public function pickupLocation() {
        return $this->hasMany('App\PickupLocation', 'booking_id')
                        ->where('pickup_position', "!=", '99');
    }

    public function pickupLocationTravelTime() {
        return $this->hasMany('App\PickupLocation', 'booking_id');
    }

    public function invoice() {
        return $this->hasMany('App\InvoiceDetails', 'booking_id');
    }

    public function dropLocation() {
        return $this->hasOne('App\PickupLocation', 'booking_id')
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
            }else if ($this->trip_status == 4) {
                return "<span class='label label-sm label-warning'> Cancel</span>";
            } else {
                return "<span class='label label-sm label-warning'> Breakdown</span>";
            }
        } else {
            if ($this->driver) {
                return "<span class='label label-sm label-success'> Driver Allocated </span>";
//                if ($this->driver->status == 1) {
//                    return "<span class='label label-sm label-success'> Accept </span>";
//                } else if ($this->driver->status == 2) {
//                    return "<span class='label label-sm label-danger'> Reject </span>";
//                } else {
//                    return "<span class='label label-sm label-warning'> Wait for Response </span>";
//                }
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

    public function pickupLocationCalender() {
        return $this->hasOne('App\PickupLocation', 'booking_id')
                        ->where('pickup_position', 1)
                        ->where('pickup_position', "!=", '99');
        //->orderBy('id', 'DESC');
    }

    public function getStartBookingTimeAttribute() {

        $travel_time = $this->pickupLocationCalender->travel_time;
        $booking_time = $this->booking_time;

        $booking_time = strtotime($booking_time);
        $actual_time = $booking_time - ($travel_time * 60);

        $actual_time = date('Y-m-d H:i:s', $actual_time);

        return $actual_time;
    }

    /* public function pickuplastLocationCalender() {
      return $this->hasOne('App\PickupLocation', 'booking_id')
      ->where('pickup_position', "!=", '99')
      ->orderBy('id', 'ASC');
      } */

    public function getTotalBookingDurationAttribute() {

        if ($this->journey_type == 2 && $this->long_return == 1) {
            if ($this->long_return == 1) {
                $carbon = new \Carbon\Carbon($this->booking_time);
                $travelTime = 0;
                foreach ($this->pickupLocationTravelTime as $pickupLocationTravelTime) {
                    $travelTime += $pickupLocationTravelTime->travel_time;
                }
                $carbon->addMinute($travelTime);
                if ($this->drop_off_to_base_time != null) {
                    $carbon->addMinute($this->drop_off_to_base_time);
                }
            } else {
                $carbon = new \Carbon\Carbon($this->booking_time);
                $carbon->addMinute($this->total_duration);
                if ($this->drop_off_to_base_time != null) {
                    $carbon->addMinute($this->drop_off_to_base_time);
                }
            }
        } else {
            $carbon = new \Carbon\Carbon($this->booking_time);
            $carbon->addMinute($this->total_duration);
            if ($this->drop_off_to_base_time != null) {
                $carbon->addMinute($this->drop_off_to_base_time);
            }
        }


        return $carbon;
    }

    public function users() {
        return $this->belongsTo('App\User', 'users_id');
    }

}
