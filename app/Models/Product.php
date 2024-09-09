<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    protected $fillable = [
        'product_name',
        'product_price',
        'title',
        'description',
        'image_url',
        'shop_id'
    ];

    public function user() {
        return $this->belongsTo(VendorSite::class, 'id');
    }
}
