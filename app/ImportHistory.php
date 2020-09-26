<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model {

    public $table = 'import_history';

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }

}
