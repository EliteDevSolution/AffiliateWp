<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\ResetCodePassword;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $to_update_email = Crypt::decryptString($req['email']);

        return view('auth.reset_password', compact('to_update_email'));
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_password(Request $request)
    {
        $req_password_time = ResetCodePassword::where('email', $request['email'])->first()->toArray()['updated_at'];

        $created_at = Carbon::parse($req_password_time);
        $current_time = Carbon::now();
        $during_time = $current_time->diffInMinutes($created_at);

        if( $during_time <= 60 ) {
            try {
                User::where('email', $request['email'])
                ->update([
                    'password' => bcrypt($request['password']),
                ]);
                return response()->json([
                    'status' => 'success!'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'failed!'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'expired!'
            ]);
        }
    }
}
