<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

    public $table = 'role_user';
    public $fillable = ['user_id','role_id'];
    public $timestamps = false;

}
