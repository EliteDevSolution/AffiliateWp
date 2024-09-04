<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialSchema extends Model
{
    protected $table = "social_schema";
    protected $fillable = ['user_id', 'post_data', 'post_date', 'social_type'];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}


