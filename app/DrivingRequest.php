<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FranchiseeTraits;

class DrivingRequest extends Model {

    use SoftDeletes;
    use FranchiseeTraits;

    public $table = "driving_request";
    //public $timestamps = true;
    public $fillable = ['franchisees_id','name','surname', 'email','dob','phone','street','locality','town','postcode','profile_pic','phl_number','phl_image','phl_expiry_date','national_insurance_no','drivinglicence', 'licence_no', 'licence_expiry_date', 'driver_experience','passport_number','passport_image','renewal_date','status'];

}
