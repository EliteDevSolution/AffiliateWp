<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\User;
use App\Models\AdsImage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = AdsImage::where('user_id', 1)->first()->toArray();
        // dd(User::with('advertise_image')->get());
        // dd(Auth::user()->id);
        // dd(AdsImage::with('user')->get());
        $template_image;

        if( auth()->user()->hasRole("administrator") ) {
            $template_image = AdsImage::all();
        } else {
            $template_image = AdsImage::all()->where('user_id', Auth::user()->id)->toArray() ?? array();
        }

        $to_send_data = [
            'template_image' => $template_image
        ];

        return view('home.home', compact('to_send_data'));
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
