<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorSite extends Model
{
    protected $table = "vendor_site";

    protected $fillable = [
        'shop_name',
        'shop_url',
        'host_name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

}
