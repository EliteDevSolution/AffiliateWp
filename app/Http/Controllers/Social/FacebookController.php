<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Providers\FacebookProvider;
use Session;
// use App\Http\Controllers\Helpers\FacebookHelper;


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
            $accessToken = "EAAQ5K6wBrBgBOZBzqD1kSxyHqx3o0G1v7H4Ups9qv8ZCqXo7JaYZCBq7R3uKhSIZBCxZAOXV5C6SNKZB5K4LxDcDW5UAE3v8FZAYHZCUOcWrdxQlN5TMGN2EOIR84pNdersvRv3qfFcos3AruB5uKdZCfZAxA8J07WXf6E1rftr5HtaNAFQScYV1IxeRQ4yPXP5BHT40QOubA90ZAogUQUQh2hTSRFXCNWR24oPaMZCmW1FADv1PTR1hQBAB";
            dd($accessToken);
        } catch(Facebook\Exception\ResponseException $e) {
        // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exception\SDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
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
