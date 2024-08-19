<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Mail\UserReadyMail;
use App\Models\VerifyCode;
use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verifycode';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'firstname' => $data['firstname'],
        //     'lastname' => $data['lastname'],
        //     'email' => $data['email'],
        //     'phone' => $data['phone'] ?? '',
        //     'status' => $data['status'],
        //     'password' => bcrypt($data['password']),
        // ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(Request $request)
    {

        $this->validator($request->all())->validate();

        // $request->request->add(['status' => 'Pending']);
        // event(new Registered($user = $this->create($request->all())));
        // $user->assignRole(array("guest"));

        $verify_code = sprintf("%06d", mt_rand(1, 999999));

        $data_to_mail = [
            "verify_code" => $verify_code,
            "first_name" => $request->all()["firstname"]
        ];

        try {
            VerifyCode::updateOrCreate(['email' => $request->all()["email"]], [
                'email'   =>   $request->all()["email"],
                'verify_code' => $verify_code,
            ]);

            $mail = $request->all()["email"];

            @Mail::to($mail)->send(new UserReadyMail($data_to_mail));

            session()->put('register_data', $request->all());
            return redirect('/verifycode');
        }
        catch (Exception $e) {
            return $this->registered($request, $user)
            ?: redirect('/register');
        }
    }
}
