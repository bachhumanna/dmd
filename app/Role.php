<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use App\Permission;
use App\PermissionRole;
use App\Traits\FranchiseeTraits;
use Kyslik\ColumnSortable\Sortable;

class Role extends EntrustRole {

    use Sortable;
    use FranchiseeTraits;

    public $table = 'roles';
    public $fillable = ['franchisees_id','name', 'display_name', 'description'];

    public function niceName() {
        return [
            'name' => 'Name',
            'display_name' => 'Display Name',
            'description' => 'Description'
        ];
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }

}
