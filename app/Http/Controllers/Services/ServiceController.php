<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $affiliate = new AffiliateHelper();
        $affRes = $affiliate->getAffliateList() ?? [];

        $toSendData = [
            "affliate" => $affRes
        ];

        return view('service.service', compact('toSendData'));
    }
}
