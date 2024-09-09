<?php

use Illuminate\Database\Seeder;
use App\Models\VendorSite;

class ShopVendorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VendorSite::create([
            'shop_name' => "Masmoney",
            'shop_url' => "https://shop.masmoney.es",
            'host_name' => "fstorm707@gmail.com"
        ]);
    }
}
