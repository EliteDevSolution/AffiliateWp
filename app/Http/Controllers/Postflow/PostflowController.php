<?php

namespace App\Http\Controllers\Postflow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Automattic\WooCommerce\Client;
use Carbon\Carbon; // Make sure to import Carbon

class PostflowController extends Controller
{

    public function __construct()
    {
        $this->woocommerce = new Client(
            'http://localhost:8086/',
            'ck_5c61beb9d65b46f54f08fc2593353e4a982889e7',
            'cs_9c5c33ce0a75ba9f80c21481e199f3854e25d76d',
            [
                'wp_api' => true, // Enable the WP API integration
                'version' => 'wc/v3', // API version
                'query_string_auth' => true // Use query string for authentication
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enabledSocialList = getEnableSocialConnectorList();
        // $response = Http::withBasicAuth('ck_5c61beb9d65b46f54f08fc2593353e4a982889e7', 'cs_9c5c33ce0a75ba9f80c21481e199f3854e25d76d')
        //        ->get('http://localhost:8086/wp-json/wc/v3/products');

        // try {
        //     $response = $this->woocommerce->get('products');
        //     dd($response);
        // } catch (Throwable $e) {
        // dd($e->getResponse());
        // }
        return view('postflow.post', compact('enabledSocialList'));
    }

    /**
     * Redirect post page with regsiter to date via session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function redirectCreatePost(Request $request)
    {
        if($request->ajax()) {
            try {
                $createDate = $request->create_date ?? '';
                session()->put('post_create_date', $createDate);
                return response()->json(['status' => true]);
            } catch (Throwable $e) {
                return response()->json(['status' => false]);
            }
        }
    }

    public function getServerTime()
    {
        return response()->json([
            'server_date' => now()->toDateString(), // Format as YYYY-MM-DD
            'server_time' => now()->format('H') // Get the hour in 24-hour format (00 to 23)
        ]);
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
