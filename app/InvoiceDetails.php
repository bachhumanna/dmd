<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model {

    public $timestamps = false;
    public $table = "invoice_details";
    public $fillable = [
        "booking_id", "comment", "qnty", "price", "discount", "vat", "amount"
    ];

}
