<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FranchisorInvoiceFee extends Model {

    use Sortable;
    public $table = "franchisor_invoice_fee";
    protected $fillable = ["name", "type", "months", "amount",'vat'];

//    public function setMonthsAttribute($value) {
//
//        if ($value) {
//            if ($this->type == 1) {
//                $this->attributes['months'] = "0";
//            } else {
//                $this->attributes['months'] = json_encode($value);
//            }
//        }
//    }

}
