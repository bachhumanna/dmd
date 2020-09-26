<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FranchisorInvoicePrice extends Model {

    public $table = "franchisor_invoice_price";
    protected $fillable = [
        "from_turnover",
        "to_turnover",
        "base_fee",
        "plus_excess",
        "max_monthly"
    ];

}
