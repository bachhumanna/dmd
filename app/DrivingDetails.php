<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivingDetails extends Model {

    public $table = "driver_details";
    public $fillable = ['employment_start_date', "drivinglicence", "licence_no", "licence_expiry_date", "driver_experience", "phl_number", "phl_image", "phl_expiry_date", "national_insurance_no", "passport_number", "passport_image", "training_certificates", "certificates_exp_date", "renewal_date", "renewal_status", "phl_expiry_status", "note", "right_work_uk"];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
