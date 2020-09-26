<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Vehicles extends Model {

    use Sortable;
    use FranchiseeTraits;
    use SoftDeletes;

    protected $fillable = [
         "franchisees_id", "color_modification","body_type", "vehicles_model", "vehicles_company", "vehicles_number", "max_capacity", "phv_licence_number", "phv_issue_date","phv_expiry_date" ,"tax_renewal_date", "insurance_date", "mot_date","wheelchair_access","insurance_status","mot_status","tax_renewal_status", "status"
    ];

    public $sortable = ["franchisees_id", "vehicles_model", "vehicles_company","vehicles_number","insurance_date","tax_renewal_date","mot_date"];

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function bodyType() {
        return $this->belongsTo('App\VehiclesBodyType', 'body_type');
    }
    public function driver(){
        return $this->hasOne('App\DriversVehicles', 'vehicle_id', 'id');
    }
}
