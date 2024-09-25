<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;

class AffiliateLinkController extends Controller
{
    public function index() {
        $affiliate = new AffiliateHelper();
        $affLink = $affiliate->getAffiliateLink(1) ?? "";

        return view('sale.affiliate', compact('affLink'));
    }
}

