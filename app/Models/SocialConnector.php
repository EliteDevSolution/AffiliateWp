<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialConnector extends Model
{
    protected $table = "social_connector";
    protected $fillable = ['user_id', 'type', 'social_id', 'name', 'social_email', 'social_avatar', 'access_token'];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}


