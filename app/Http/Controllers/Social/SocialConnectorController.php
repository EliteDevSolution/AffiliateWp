<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\SocialConnector;
use App\Providers\TiktokProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SocialConnectorController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    }

     /**
     * Disconnect to social Account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disconnectSocial(Request $request)
    {
        if($request->ajax()) {
            try {
                SocialConnector::where(['user_id' => request()->user()->id, 'type' => $request->type])->delete();
                return response()->json(['status' => true]);
            } catch (Throwable $e) {
                return response()->json(['status' => false]);
            }
        }
    }

    public function connectTiktok(Request $request)
    {
        $loginUrl = TiktokProvider::getTiktokLoginUrl();
        return redirect($loginUrl);
    }

    public function redirectTiktok(Request $request)
    {
        $userInform = TiktokProvider::handleTikTokCallback($request);

        if($userInform['access_token']) {

            $accessToken = $userInform['access_token'];
            $refreshToken = $userInform['refresh_token'];
            $userName = $userInform['user_inform']['user']['display_name'];
            $socialId = $userInform['user_inform']['user']['open_id'];
            $userAvatar = $userInform['user_inform']['user']['avatar_url'];

            SocialConnector::updateOrCreate(['user_id' => request()->user()->id],
            [
                'user_id'   =>  request()->user()->id,
                'type' => 'Tiktok',
                'social_id'   =>  $socialId,
                'name' => $userName ?? '',
                'social_email' => '',
                'social_avatar' => '',
                'access_token' => $accessToken ?? '',
                'refresh_token' => $refreshToken ?? '',
            ]);

            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function tikTokWebhook(Request $request) {
        return "this is!";
    }

    public function postToTikTok(Request $request) {
        $currentUser = request()->user()->id;
        $socialConnector = SocialConnector::where('user_id', $currentUser)->first();
        $imgUrl = "https://masmoney.es/postflow_assests/images/products/product-1.jpg";

        if ($socialConnector) {
            $accessToken = $socialConnector->access_token;

            // $request->validate([
            //     'photo_urls' => 'required|array|min=1',
            //     'photo_urls.*' => 'url',
            //     'title' => 'required|string|max:100',
            //     'description' => 'required|string|max:150',
            // ]);

            $payload = [
                'post_info' => [
                    'title' => "My first post photo",
                    'description' => "This is first my photo",
                ],
                'source_info' => [
                    'source' => 'PULL_FROM_URL',
                    'photo_cover_index' => 0, // Assuming the first image is the cover photo
                    'photo_images' => [$imgUrl],
                ],
                'post_mode' => 'MEDIA_UPLOAD',
                'media_type' => 'PHOTO',
            ];

            $response = Http::withToken($accessToken)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://open.tiktokapis.com/v2/post/publish/content/init/', $payload);

            $responseData = $response->json();
            dd($response);
        } else {
            return response()->json([
                'status' => false
            ], 404);
        }
    }

    public function scheduleTiktok(Request $request) {
        return 'Only success!!';
    }
}
