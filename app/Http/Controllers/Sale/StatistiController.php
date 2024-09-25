<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;

class StatistiController extends Controller
{
    public function index() {
        $affiliate = new AffiliateHelper();
        $affStats = $affiliate->getAffiliateStats();

        return view('sale.statistic', compact('affStats'));
    }
}
