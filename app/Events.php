<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FranchiseeTraits;
use Kyslik\ColumnSortable\Sortable;

class Events extends Model {

    use Sortable;
    use SoftDeletes;
    use FranchiseeTraits;

    public $table = "events";
    public $fillable = [
        "title", "description", "posted_date", "event_for", "users_id"
    ];

    public $sortable = ["title", "description", "posted_date"];

    public function users() {
        return $this->belongsTo('App\User', 'users_id');
    }

}
