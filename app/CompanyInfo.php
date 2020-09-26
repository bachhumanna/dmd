<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;

class CompanyInfo extends Model {

    use FranchiseeTraits;

    public $table = "company_info";
    public $fillable = [
        "franchisees_id", "company_name", "trading_name", "company_number", "registered_office", "account_no", "lawyers", "phone_number", "company_email", "linkedin", "instagram", "facebook", "incorporation_date", "year_end", "confirmation_statement_date", "business_address", "account_name", "sort_code", "vat_number", "vat_reg", 'cheques_payable',"account_filling_date","hmrc_filling_date"
    ];

    //protected $dateFormat = 'Y-m-d';

    protected $casts = [
        //'incorporation_date' => 'date_format:yyyy-mm-dd',
        //'incorporation_date'  => 'date:Y-m-d',
    ]; 

    public function vatreg() {
        return $this->hasMany('App\VatReg', 'franchisees_id', 'franchisees_id');
    }

    public function socialMedia() {
        return $this->hasMany('App\SocialMedia', 'franchisees_id', 'franchisees_id');
    }
    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function directors() {
        return $this->hasMany('App\Director', 'franchisees_id', 'franchisees_id');
    }

}
