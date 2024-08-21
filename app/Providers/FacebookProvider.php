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
            'default_graph_version' => 'v11.0',
        ]);
    }

    public function getFaceBookLoginUrl()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = ['email'];
        $url = $helper->getLoginUrl(config('facebook.redirect'), $permissions);
        return $url;
    }

    public function facebookHelper()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        return $helper;
    }

    public function getLongLivedAccessToken()
    {
        try {
            $oAuth2Client = $this->facebook->getOAuth2Client();
            return $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (FacebookSDKException $e) {
            throw new Exception("Error getting a long-lived access token: {$e->getMessage()}");
        }
    }

    public function getFaceBookUserInfo($accessToken)
    {
        try {
            // Get the Facebook user profile
            $response = $this->facebook->get('/me?fields=id,name,email,picture.type(large)', $accessToken);
            $userData = $response->getGraphNode()->asArray();
            return $userData;
        } catch (FacebookResponseException $e) {
            // Handle Graph API errors
            throw new Exception("Graph returned an error: {$e->getMessage()}");
        } catch (FacebookSDKException $e) {
            // Handle SDK errors
            throw new Exception("Facebook SDK returned an error: {$e->getMessage()}");
        }
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
