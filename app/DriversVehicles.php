<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriversVehicles extends Model {

    use FranchiseeTraits;
    use SoftDeletes;

    protected $fillable = ["franchisees_id", "user_id", "vehicle_id"];

    public function driver() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function vehicle() {
        return $this->belongsTo('App\Vehicles', 'vehicle_id');
    }

}
