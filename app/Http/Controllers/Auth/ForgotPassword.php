<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\ResetCodePassword;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ForgotPassword extends Controller
{
    public function reset_password(Request $request) {
        $exist_user_count = User::where('email', $request['email'])->count();
        if( $exist_user_count > 0 ) {
            ResetCodePassword::updateOrCreate(['email' => $request['email']], [
                'email'   =>   $request['email'],
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            @Mail::to("super@localhost.com")->send(new ForgotPasswordMail($request['email']));
            return response()->json([
                'status' => 'Your email is sent'
            ]);
        } else {
            return response()->json([
                'status' => 'invalid user'
            ]);
        }
    }
}
