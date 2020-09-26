<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Illuminate\Database\Eloquent\SoftDeletes;

class FranchisorInvoice extends Model {

    use FranchiseeTraits;
    use SoftDeletes;

    public $table = "franchisorinvoice";
    public $fillable = [
        "invoice_no","franchisees_id", "turnover", "invoice_for_month", "invoice_for_year", "standard_fee", "commission","amount",'custom_entry','comment','VAT'
    ];
    
    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function invoiceDetails(){
        return $this->hasMany('App\FranchisorInvoiceDetails','invoice_id')->where('fee_id',"!=",-1);
    }
    public function invoiceDetailsCustom(){
        return $this->hasMany('App\FranchisorInvoiceDetails','invoice_id')->where('fee_id',-1);
    }

}
