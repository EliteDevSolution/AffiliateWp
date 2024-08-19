<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Models\VerifyCode;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Events\Registered;

use Carbon\Carbon;

use Illuminate\Http\Request;

class VerifycodeController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $email = session()->get('register_data')['email'];
        return view('auth.verifycode', compact('email'));
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create_user(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? '',
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function confirm_code(Request $request)
    {
        $status = "ok";
        // dd($req['verify_code'], $req['email']);
        $email = session()->get('register_data')['email'];

        $verify_data = VerifyCode::where('email', $email)->first()->toArray();
        $verify_db_code = $verify_data['verify_code'];
        $verify_created_at = $verify_data['updated_at'];

        $created_at = Carbon::parse($verify_created_at);
        $current_time = Carbon::now();
        $during_time = $current_time->diffInMinutes($created_at);

        if( $during_time <= 60 ) {
            if( $verify_db_code === $request['verify_code'] ) {
                try {
                    $register_data = session()->get('register_data');
                    $register_data['status'] = 'Approve';
                    unset($register_data['_token']);

                    event(new Registered($user = $this->create_user($register_data)));
                    $user->assignRole(array("guest"));

                    return response()->json([
                        'status' => 'success'
                    ]);
                } catch (Exception $e) {

                }
            } else {
                return response()->json([
                    'status' => 'inccorect'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'expired'
            ]);
        }

    }
}
