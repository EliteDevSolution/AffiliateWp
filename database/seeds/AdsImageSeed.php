<?php

use App\Models\AdsImage;

use Illuminate\Database\Seeder;

class AdsImageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdsImage::create([
            'image_name' => 'Sample Image 1',
            'image_path' => '/home_assets/img/gallery1.jpg',
            'image_title' => 'Sample Title 1',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 1
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 2',
            'image_path' => '/home_assets/img/gallery2.jpg',
            'image_title' => 'Sample Title 2',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 1
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 3',
            'image_path' => '/home_assets/img/gallery3.jpg',
            'image_title' => 'Sample Title 3',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 4
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 4',
            'image_path' => '/home_assets/img/gallery4.jpg',
            'image_title' => 'Sample Title 4',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 5
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 5',
            'image_path' => '/home_assets/img/gallery5.jpg',
            'image_title' => 'Sample Title 5',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 5
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 6',
            'image_path' => '/home_assets/img/gallery6.jpg',
            'image_title' => 'Sample Title 6',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 6
        ]);
        AdsImage::create([
            'image_name' => 'Sample Image 7',
            'image_path' => '/home_assets/img/gallery7.jpg',
            'image_title' => 'Sample Title 7',
            'template_or_custom' => false,
            'social_site' => 'Twitter',
            'user_id' => 6
        ]);
    }
}
