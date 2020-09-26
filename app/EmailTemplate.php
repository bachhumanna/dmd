<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;

class EmailTemplate extends Model {

    use FranchiseeTraits;

    public $table = 'email_template';
    public $timestamps = false;
    protected $fillable = ["title", "subject", "from_name", "from_email", "description", "content", "status"];

}
