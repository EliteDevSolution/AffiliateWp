<?php

namespace App\Http\Controllers\SubmitClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        // return redirect()->away('https://shop.masmoney.es/');
        return view('client.submit_client');
    }

    public function submitClient(Request $request)
    {
        $client = Client::where('email', $request['email'])->get();

        if( count($client) > 0 ) {
            return "The client exist";
        } else {
            $client = new Client();

            $client->email = $request['email'];
            $client->name = $request['name'];
            $client->phone_number = $request['phoneNumber'];
            try {
                $client->save();
                return "success";
            } catch (error) {
                return "faield";
            }
        }
    }
}
