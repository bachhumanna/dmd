<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FranchisorInvoiceDetails extends Model {

    public $timestamps = false;
    public $table = "franchisorinvoice_details";
    protected $fillable = ["invoice_id", "fee_type", "amount",];

}
