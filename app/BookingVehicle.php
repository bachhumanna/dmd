<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingVehicle extends Model {

    use SoftDeletes;

    public $table = "booking_vehicle";
    protected $fillable = ['status',"booking_id", "vehicle_id"];

    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function booking() {
        return $this->belongsTo('App\User', 'booking_id');
    }
    public function vehicle() {
        return $this->belongsTo('App\Vehicles', 'vehicle_id');
    }
}
