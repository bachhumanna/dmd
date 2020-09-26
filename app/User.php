<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\FranchiseeTraits;

use Kyslik\ColumnSortable\Sortable;

//use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable {

    use Sortable;
    //use SoftDeletes;
    use EntrustUserTrait;
    use Notifiable;
    use FranchiseeTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'franchisees_id', 'password', 'status', 'phone', 'address', 'locality','profile_pic', 'dob','username','street'
    ];

    public $sortable = ["name", "email", "franchisees_id","phone","address","locality","dob","username","user_type","username"];

    // protected $fillable = [
    //     'name','surname', 'email', 'franchisees_id', 'password','country', 'status', 'phone', 'street', 'locality','town','profile_pic', 'postcode', 'dob'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRole() {
        return $this->belongsToMany('App\Role');
    }

    public function userDriverdetails() {
        return $this->hasOne('App\DrivingDetails', 'user_id', 'id');
    }

    public function driverVehicles(){
        return $this->hasOne('App\DriversVehicles', 'user_id', 'id');
    }

    public function getFullNameAttribute(){
        return $this->name." ".$this->surname;
    }
    public function getImageAttribute(){
        return asset("images/profilepic/".$this->profile_pic);
    }

     public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
    public function getacceptBookingDetails() {
        return $this->hasMany('App\Booking','users_id','id');
    }
    public function driverBooking(){
        return $this->hasMany('App\Booking','driver_id');
    }

    public function userCertificateDetails() {
        return $this->hasMany('App\Certificate','user_id','id');
    }

}
