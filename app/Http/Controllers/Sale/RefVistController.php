<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;
use Carbon\Carbon;

class RefVistController extends Controller
{
    public function index() {
        $affiliate = new AffiliateHelper();
        $referrals = $affiliate->getRefferals() ?? [];
        $visitors = $affiliate->getVisitors() ?? [];

        return view('sale.refer_visit', compact('referrals', 'visitors'));
    }
}
