<?php

namespace App\Http\Controllers\Helpers;
use Facebook\Facebook;
use Laravel\Socialite\Facades\Socialite;

class FacebookHelper
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

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Sportmonks fetchdata.
     *
     * @param string $url
     * @param string $method
     * @param string $options
     * @param array $postData
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index()
    {

    }
}
