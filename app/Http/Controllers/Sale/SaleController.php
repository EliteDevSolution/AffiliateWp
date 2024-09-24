<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $affiliate = new AffiliateHelper();

        $affRes = $affiliate->getAffliateList() ?? [];
        $refferals = $affiliate->getRefferals() ?? [];

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $lastMonth = Carbon::now()->subMonth()->month;
        $lastMonthYear = Carbon::now()->subMonth()->year;

        $refferalRateOfLastByNow;
        $vistorRateOfLastByNow;

        $currentRefferal = 0;
        $currentVisitor = 0;
        $currentMonthAffiliates = [];

        $totalUnpaidEarning = 0;
        $totalUnpaidRefferal = 0;
        $totalEarning = 0;
        $totalRefferal = 0;
        $totalVisitor = 0;
        $totalConversationRate = 0;

        foreach ($affRes as $affiliate) {
            $totalRefferal++;
            $totalVisitor += (int) $affiliate['visits'];
            if ($totalVisitor == 0) {
                $totalConversationRate = 100;
            } else {
                $totalConversationRate = $totalRefferal * 100 / $totalVisitor;
            }

            $totalEarning += $affiliate['earnings'];

            if($affiliate['unpaid_earnings'] != 0) {
                $totalUnpaidRefferal++;
                $totalUnpaidEarning += (int) $affiliate['unpaid_earnings'];
            }

            $registeredDate = Carbon::parse($affiliate['date_registered']);
            $registeredMonth = $registeredDate->month;
            $registeredYear = $registeredDate->year;

            if ($registeredMonth == $currentMonth && $registeredYear == $currentYear) {
                $currentRefferal += (int) $affiliate['referrals'];
                $currentVisitor += (int) $affiliate['visits'];
                $currentMonthAffiliates[] = $affiliate;
            }
        }

        $lastMonthRefferal = 0;
        $lastMonthVisitor = 0;
        $lastMonthAffiliates = [];

        foreach ($affRes as $affiliate) {
            $registeredDate = Carbon::parse($affiliate['date_registered']);
            $registeredMonth = $registeredDate->month;
            $registeredYear = $registeredDate->year;

            if ($registeredMonth == $lastMonth && $registeredYear == $lastMonthYear) {
                $lastMonthRefferal += (int) $affiliate['referrals'];
                $lastMonthVisitor += (int) $affiliate['visits'];
                $lastMonthAffiliates[] = $affiliate;
            }
        }

        if($lastMonthRefferal == 0) {
            $refferalRateOfLastByNow = 100;
        } else {
           $refferalRateOfLastByNow = ($currentRefferal * 100 / $lastMonthRefferal) - 100;
        }

        if($lastMonthVisitor == 0) {
            $vistorRateOfLastByNow = 100;
        } else {
            $vistorRateOfLastByNow = ($currentVisitor * 100 / $lastMonthVisitor) - 100;
        }

        $lastConversationRate;

        if($lastMonthVisitor == 0) {
            $lastConversationRate = 100;
        } else {
            $lastConversationRate = $lastMonthRefferal * 100 / $lastMonthVisitor;
        }

        $toSendData = [
            'lastRefferalCount' => $lastMonthRefferal,
            'rateOfRefferal' => $refferalRateOfLastByNow,
            'lastVisitorCount' => $lastMonthVisitor,
            'rateOfVisotor' => $vistorRateOfLastByNow,
            'lastConversationRate' => $lastConversationRate,
            'totalUnpaidEarning' => $totalUnpaidEarning,
            'totalUnpaidRefferal' => $totalUnpaidRefferal,
            'totalRefferal' => $totalRefferal,
            'totalVisitor' => $totalVisitor,
            'paidRefferal' => $totalRefferal - $totalUnpaidRefferal,
            'totalConversationRate' => $totalConversationRate,
            'totalEarning' => $totalEarning,
            'refferals' => $refferals
        ];

        return view('sale.sales', compact('toSendData'));
    }
}
