<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialConnector;
use App\Providers\TiktokProvider;


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
        TiktokProvider::handleTikTokCallback();

    }

    public function tikTokWebhook(Request $request) {
        return "this is!";
    }
}
