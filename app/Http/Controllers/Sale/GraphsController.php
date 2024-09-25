<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\AffiliateHelper;
use Carbon\Carbon;

class GraphsController extends Controller
{
    public function index() {
        $affiliate = new AffiliateHelper();
        $referralsData = $affiliate->getRefferals();

        $earningsByDate = [];

        // Process the referrals data to get earnings grouped by date
        foreach ($referralsData as $referral) {
            $registeredDate = Carbon::parse($referral['date'])->format('j/M'); // Format date to '1/Sep'
            $status = $referral['status'] ?? 'unpaid'; // Default status to 'unpaid' if not set

            // Initialize date entry if not exists
            if (!isset($earningsByDate[$registeredDate])) {
                $earningsByDate[$registeredDate] = [
                    'unpaid' => 0,
                    'pending' => 0,
                    'rejected' => 0,
                    'paid' => 0,
                ];
            }

            // Add earnings based on status
            if (isset($referral['amount'])) {
                $earningsByDate[$registeredDate][$status] += $referral['amount'];
            }
        }

        // Prepare data for chart
        $dates = array_keys($earningsByDate);
        $unpaid = array_column($earningsByDate, 'unpaid');
        $pending = array_column($earningsByDate, 'pending');
        $rejected = array_column($earningsByDate, 'rejected');
        $paid = array_column($earningsByDate, 'paid');

        return view('sale.graphs', compact('dates', 'unpaid', 'pending', 'rejected', 'paid'));
    }
}
