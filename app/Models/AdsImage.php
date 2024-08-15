<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
    protected $table = "ads_image";
    protected $fillable = ['image_name', 'user_id', 'image_path', 'image_title', 'template_or_custom', 'social_site'];

    public function user () {
        return $this->belongsTo(User::class, 'id');
    }
}

