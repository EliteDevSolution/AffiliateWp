<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class TiktokProvider extends ServiceProvider
{
    public static function getTiktokLoginUrl()
    {
         $url = "https://open-api.tiktok.com/platform/oauth/connect/?client_key=" . config('tiktok.client_key') .
               "&response_type=code&scope=user.info.basic,video.upload&redirect_uri=" . urlencode(config('tiktok.redirect'));
        return $url; // Return the URL instead of redirecting
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
