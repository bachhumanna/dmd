<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model {
    
    public $pageAttribute ="";

    public $table = "social_media";
    protected $fillable = [
        "id", "company_id",'social_media_name' ,"social_media_link", "created_at", "updated_at", "deleted_at"
    ];

}
