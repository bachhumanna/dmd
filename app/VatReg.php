<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatReg extends Model {
    public $table = "vat_reg";
    public $fillable = ["franchisees_id", "vat_reg_date", "vat_de_reg_date"];

    //protected $dateFormat = 'Y-m-d';


    protected $casts = [
        //'invoice_date' => 'date_format:yyyy-mm-dd',
        //'invoice_date'  => 'date:Y-m-d',
    ];
}