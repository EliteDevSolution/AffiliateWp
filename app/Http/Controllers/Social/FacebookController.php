<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Providers\FacebookProvider;
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

     public function index()
    {

    }

     public function go_to_facebook()
    {
        $this->facebook = new FacebookProvider();
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

    public function redirecet_facebook() {
        $this->facebook = new FacebookProvider();
        $helper = $this->facebook->facebookHelper();
        try {
            $accessToken = $helper->getAccessToken();
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
