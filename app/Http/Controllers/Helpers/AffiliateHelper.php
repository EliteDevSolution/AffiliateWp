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
}
