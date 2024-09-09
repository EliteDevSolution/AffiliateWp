<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialSchedule extends Model
{
    protected $table = "social_schedule";

    protected $fillable = [
        'user_id',
        'social_type',
        'image_url',
        'post_data',
        'post_date',
        'post_time'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
