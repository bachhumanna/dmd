<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FranchiseeTraits;
use Kyslik\ColumnSortable\Sortable;

class Franchisee extends Model {

    use Sortable;
    use SoftDeletes;
    use FranchiseeTraits;

    public $fillable = [
        'base_location',
        "name",
        "contact_person_name",
        "contact_person_phone",
        "contact_person_email",
        "status",
        // "company_name",
        // "company_number",
        // "reg_address",
        // "incorporation_date",
        // "company_yearend",
        // "conf_stat_date",
        "address",
        "locality",
        "public_liability_insurance",
        "employers_liability_insurance",
        "franchise_license_renewal_date",
        // "company_year_end",
        // "confirmation_statement_date",
        "contact_person_name_sec",
        "contact_person_phone_sec",
        "owner_dmd_mobilenumber",
        "owner_dmd_mobilenumber_sec",
        "owner_homenumber",
        "contact_person_email_sec",
        "franchise_owner_dmd_email",
        "franchise_manager_name",
        "manager_person_phone",
        "manager_dmd_mob_frn_owner",
        "manager_dmd_email_frn_owner",
        "franchise_administrator_name",
        "administrator_person_phone",
        "administrator_dmd_mob_frn_owner",
        "administrator_dmd_email_frn_owner",
        // "vat_reg",
        //  "vat_number",
        //  "vat_reg_date",
        //  "vat_dereg_date",
        "bank_account_no",
        "account_name",
        "amount_cover",
        "franchise_agreement",
        "amendments",
        "shareholders_nameone",
        "shareholders_nametwo",
        "shareholders_namethree",
        "shareholders_namefour",
        "share_percentageone",
        "share_percentagetwo",
        "share_percentagethree",
        "share_percentagefour",
        "franchise_license_renewal_status",
        "employers_liability_insurance_status",
        "public_liability_insurance_status",
        "bank_sortcode"
    ];

    public $sortable = ["name", "contact_person_name", "contact_person_phone","locality","address"];

    public function priceDetails() {
        return $this->hasOne('App\FranchiseesPrice', 'franchisees_id', 'id');
    }

    public function companyInfo() {
        return $this->hasOne('App\CompanyInfo', 'franchisees_id', 'id');
    }

    public function getFullAddressAttribute() {

        return $this->street . " " . $this->locality . " " . $this->town . " " . $this->postcode;
    }
    public function vatRegdate(){
        return $this->hasMany('App\VatReg', 'franchisees_id','id');
    }

}
