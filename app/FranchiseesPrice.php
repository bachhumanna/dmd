<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use OwenIt\Auditing\Contracts\Auditable;
use Kyslik\ColumnSortable\Sortable;

class FranchiseesPrice extends Model implements Auditable {

    use Sortable;
    use FranchiseeTraits;
    use \OwenIt\Auditing\Auditable;

    protected $auditExclude = [
        'franchisees_id',
    ];
    public $vat_registration;
    public $table = "franchisees_price";
    public $timestamps = true;
    public $fillable = [
        "franchisees_id",
        "driver_cost",
        "vehicle_cost",
        "comfort_cost",
        "paid_mileage",
        "base_driving_cost",
        "waiting_time_cost",
        "companionship_cost",
        "companion_cost"
    ];

    public $sortable = ["franchisees_id", "driver_cost", "vehicle_cost","comfort_cost","paid_mileage","base_driving_cost","waiting_time_cost","companionship_cost","companion_cost"];

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }

}
