<?php

namespace App\Http\Controllers\Helpers;

use Ixudra\Curl\Facades\Curl;


class AffiliateHelper
{
    public function __construct()
    {
        $this->apiKey = config('affiliate.public_key');
        $this->authToken = config('affiliate.public_token');
        $this->endPoint = config('affiliate.end_point');
    }

    /**
     * Sportmonks fetchdata.
     *
     * @param string $url
     * @param string $method
     * @param string $options
     * @param array $postData
     * @return  \Illuminate\Http\JsonResponse
     */
    public function getAffliateList()
    {
        $response = Curl::to($this->endPoint .'/affiliates')
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->get();

        $jsonResponse = json_decode($response, true); // true converts it to an associative array

        return $jsonResponse;
    }

    public function getRefferals()
    {
        $response = Curl::to($this->endPoint .'/referrals')
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->get();

        $jsonResponse = json_decode($response, true); // true converts it to an associative array

        return $jsonResponse;
    }

    public function getAffiliateLink($affiliateId)
    {
        $response = Curl::to($this->endPoint . '/affiliates/' . $affiliateId)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->get();

        $jsonResponse = json_decode($response, true);

        if (isset($jsonResponse['base_url'])) {
            $affiliateLink = $jsonResponse['base_url'] . '?ref=' . $affiliateId;
            return $affiliateLink;
        }

        return 'Affiliate link could not be generated.';
    }

    public function getAffiliateStats() {
    // Set up the API request to get referrals
        $referralsResponse = Curl::to($this->endPoint . '/referrals')
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->get();

        // Decode the response into an associative array
        $referralsData = json_decode($referralsResponse, true);

        // Initialize variables for calculations
        $unpaidReferrals = 0;
        $paidReferrals = 0;
        $visits = 0; // Assuming you have a way to track visits separately
        $unpaidEarnings = 0;
        $paidEarnings = 0;
        $commissionRate = 0; // This might be a fixed value or fetched from somewhere
        $campaigns = []; // To store unique campaigns
        $uniqueLinks = []; // To store unique links
        $converted = 0; // Counter for converted referrals

        // Loop through the referral data to calculate statistics
        foreach ($referralsData as $referral) {
            // Unpaid vs Paid Referrals
            if ($referral['status'] === 'unpaid') {
                $unpaidReferrals++;
                $unpaidEarnings += $referral['amount'] ?? 0; // Using null coalescing operator
            } else {
                $paidReferrals++;
                $paidEarnings += $referral['amount'] ?? 0;
            }

            // Count visits if it exists
            if (isset($referral['visits'])) {
                $visits += $referral['visits'];
            }

            // Collect campaigns and unique links if they exist
            if (isset($referral['campaign'])) {
                $campaigns[] = $referral['campaign'];
            }

            if (isset($referral['link'])) {
                $uniqueLinks[] = $referral['link'];
            }

            // Check if converted field exists
            if (isset($referral['converted']) && $referral['converted']) {
                $converted++;
            }
        }

        // Calculate conversion rate
        $conversionRate = $converted > 0 ? ($converted / ($unpaidReferrals + $paidReferrals)) * 100 : 0;

        // Get unique campaigns and links
        $uniqueCampaigns = array_unique($campaigns);
        $uniqueLinksCount = count(array_unique($uniqueLinks));

        // Prepare the result array
        $result = [
            'unpaid_referrals' => $unpaidReferrals,
            'paid_referrals' => $paidReferrals,
            'visits' => $visits,
            'conversion_rate' => $conversionRate,
            'unpaid_earnings' => $unpaidEarnings,
            'paid_earnings' => $paidEarnings,
            'commission_rate' => $commissionRate,
            'unique_campaigns' => $uniqueCampaigns,
            'unique_links' => $uniqueLinksCount,
            'converted' => $converted
        ];

        return $result;
    }

    public function getVisitors()
    {
        $response = Curl::to('http://localhost:8086/wp-json/affwp/v1/visits')
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->get();

        $jsonResponse = json_decode($response, true); // true converts it to an associative array

        return $jsonResponse;
    }
}
