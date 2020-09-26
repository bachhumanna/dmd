<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
class DriverAttendance extends Model {
    use FranchiseeTraits;
    public $timestamps =false;
    public $table = "driver_attendance";
}
