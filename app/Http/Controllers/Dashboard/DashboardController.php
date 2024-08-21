<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;
use App\Models\SocialConnector;

class DashboardController extends Controller
{
    /**`
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $affiliate = new AffiliateHelper();
        $res = $affiliate->index();
        $connectedSocialLst = SocialConnector::where(['user_id' => request()->user()->id])->get()->toArray();
        $facebook = findArrayData($connectedSocialLst, 'type', 'Facebook');
        $instagram = findArrayData($connectedSocialLst, 'type', 'Instagram');
        $tiktok = findArrayData($connectedSocialLst, 'type', 'Tiktok');
        $twitter = findArrayData($connectedSocialLst, 'type', 'Twitter');
        $linkedin = findArrayData($connectedSocialLst, 'type', 'Linkedin');
        return view('dashboard.dashboard', compact('facebook', 'instagram', 'tiktok', 'twitter', 'linkedin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        // return view('admin.dashboard.index' ,compact('key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

    }
}
