<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Facebook\Facebook;

class FacebookProvider extends ServiceProvider
{

    protected $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'default_graph_version' => 'v11.0'
        ]);
    }

    public function getFaceBookLoginUrl()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = ['email'];
        $url = $helper->getLoginUrl('https://masmoney.es/facebook-callback', $permissions);
        return $url;
    }

    public function facebookHelper()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        return $helper;
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
