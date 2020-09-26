<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model {
    public $timestamps  =false;
    public $table = 'permission_role';
    public $fillable = ['permission_id', 'role_id'];

}
