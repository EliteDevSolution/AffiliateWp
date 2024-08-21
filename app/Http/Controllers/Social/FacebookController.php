<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Providers\FacebookProvider;
use App\Models\SocialConnector;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    protected $facebook;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->facebook = new FacebookProvider();
    }

    public function index()
    {

    }

     public function go_to_facebook()
    {
        $url = $this->facebook->getFaceBookLoginUrl();
        return redirect($url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function redirecet_facebook(Request $request) {

        $helper = $this->facebook->facebookHelper();

        if ($request->get('state')) {
            $helper->getPersistentDataHandler()->set('state', $request->get('state'));
        }

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exception\ResponseException $e) {
        // When Graph returns an error
            throw new Exception("Graph returned an error: {$e->getMessage()}");
        } catch(Facebook\Exception\SDKException $e) {
            // When validation fails or other local issues
            throw new Exception("Facebook SDK returned an error: {$e->getMessage()}");
        }

        if (!$accessToken->isLongLived()) {
            $accessToken = $this->facebook->getLongLivedAccessToken();
        }

        $token = $accessToken->getValue();
        if($token !== "")
        {
            $userData = $this->facebook->getFaceBookUserInfo($accessToken);
            $userFbId = $userData['id'];
            $userName = $userData['name'];
            $userEmail = $userData['email'];
            $userAvatar = $userData['picture']['url'];

            SocialConnector::updateOrCreate(['user_id' => request()->user()->id], 
            [
                'user_id'   =>   request()->user()->id,
                'type' => 'Facebook',
                'social_id'   =>  $userFbId,
                'name' => $userName ?? '',
                'social_email' => $userEmail ?? '',
                'social_avatar' => $userAvatar ?? '',
                'access_token' => $token ?? ''
            ]);

            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
