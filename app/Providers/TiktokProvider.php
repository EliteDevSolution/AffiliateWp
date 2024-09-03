<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class TiktokProvider extends ServiceProvider
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->clientId = config('tiktok.client_key');
        $this->clientSecret = config('tiktok.client_secret');
        $this->redirectUri = config('tiktok.redirect');
    }

    public static function getTiktokLoginUrl()
    {
        $url = 'https://www.tiktok.com/v2/auth/authorize';
        $query = http_build_query([
            'client_key' => config('tiktok.client_key'),
            'response_type' => 'code',
            'scope' => 'user.info.basic',
            'redirect_uri' => config('tiktok.redirect'),
            'state' => csrf_token(),
        ]);

        return ($url . '?' . $query);
    }

    public static function handleTikTokCallback()
    {
        $code = $request->input('code');
        $state = $request->input('state');

        dd($code, $statu);
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
