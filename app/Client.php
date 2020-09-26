<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model {

    use Sortable;
    use FranchiseeTraits;

    public $table = "client";
    public $paying_bill;
    public $fillable = [
        "id","franchisees_id", "users_id", "firstname", "surname", "email", "phone", 'dob', "house_number", "address", "mobility_level", "client_health_notes","home_number","payment_clientid"
    ];

    public $sortable = ["franchisees_id", "firstname", "email","phone","home_number","address"];

   public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function getNameAddressAttribute(){
        return $this->firstname." ".$this->surname;
    }

    public function getNameAttribute(){
        return $this->firstname." ".$this->surname;
    }
//    public function getAddressAttribute(){
//        return $this->house_number.", ".$this->street.", ".$this->city.", ".$this->postcode;
//    }
    public function clientHistory() {
        return $this->hasMany('App\Booking','client_id');
    }

    public function WhoPayBill() {
        return $this->belongsTo('App\Client','payment_clientid');
    }


}
