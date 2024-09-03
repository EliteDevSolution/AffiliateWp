<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

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

    public static function handleTikTokCallback(Request $request)
    {
        $code = $request->input('code');
        $state = $request->input('state');

        // if ($state !== csrf_token()) {
        //     return redirect('/login')->withErrors(['msg' => 'Invalid state token']);
        // }

        try {
            $response = Http::asForm()->post('https://open.tiktokapis.com/v2/oauth/token/', [
                'client_key' => config('tiktok.client_key'),
                'client_secret' => config('tiktok.client_secret'),
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => config('tiktok.redirect'),
            ]);

            $data = $response->json();
            dd($response);
            if (isset($data['data']['access_token'])) {
                $accessToken = $data['data']['access_token'];
                // Fetch the user info
                $userResponse = Http::withToken($accessToken)->get('https://open-api.tiktok.com/user/info/');
                $user = $userResponse->json();

                // Here you can handle the user info, register or login the user
                // Example:
                // $authUser = User::firstOrCreate([
                //     'tiktok_id' => $user['data']['user']['open_id'],
                // ], [
                //     'name' => $user['data']['user']['display_name'],
                //     'avatar' => $user['data']['user']['avatar_url'],
                // ]);
                // Auth::login($authUser, true);

                return redirect('/home');
            } else {
                return redirect('/login')->withErrors(['msg' => 'Failed to get access token from TikTok']);
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'An error occurred during TikTok login']);
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
