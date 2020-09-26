<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Traits\FranchiseeTraits;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model {

    public $table = "certificate";
    public $fillable = [
        "user_id", "certificate_img","certificate_name","certificate_expiry_date"
    ];
}
