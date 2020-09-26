<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Faq extends Model {
    
    use Sortable;
   
    protected $fillable = ["question", "answer", "status"];
    
    public $sortable = ["question", "answer", "status"];
     
    
}
