<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartPayment extends Model {
    
    public $table = "part_payment";
    
    protected $fillable = ["invoice_id", "amount", "start_outstanding_amount", "end_outstanding_amount", "payment_time"];
}
