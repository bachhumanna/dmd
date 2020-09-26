<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultPermissions extends Model {

    public $table = 'default_permissions';
    public $fillable = ['type', 'name'];

}
