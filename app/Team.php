<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Team extends Model {
    
    use Sortable;
   
    public $fillable = [
        "name", "role", "email", "phone", "photo", "bio","show_company_details"
    ];
    
    public $sortable = ["name", "role", "email", "phone", "photo", "bio","show_company_details"];

}
