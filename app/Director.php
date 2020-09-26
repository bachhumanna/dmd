<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model {

    use FranchiseeTraits;
    use SoftDeletes;

    public $table = "directors";
    public $paying_bill;
    public $fillable = [
        "id","franchisees_id", "director_name", "director_email", "director_phone", "director_job_role", "director_bio","director_image","created_at","updated_at"
    ];

    
    
}
