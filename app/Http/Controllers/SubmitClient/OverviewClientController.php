<?php

namespace App\Http\Controllers\SubmitClient;

use Auth;
use App\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OverviewClientController extends Controller
{
    public function index() {
        if (auth()->user()->hasRole("administrator")) {
            $clients = Client::all()->toArray();
            return view('client.overview_client', compact('clients'));
        } else {
            return redirect()->to("/home");
        }
    }
}
