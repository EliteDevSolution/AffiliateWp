<?php

use App\Models\Socialsite;
use Illuminate\Database\Seeder;


class SocialTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socialsite::create(['name' => 'Facebook']);
        Socialsite::create(['name' => 'Instagram']);
        Socialsite::create(['name' => 'Tiktok']);
        Socialsite::create(['name' => 'Twitter']);
        Socialsite::create(['name' => 'Linkedin']);
    }
}
