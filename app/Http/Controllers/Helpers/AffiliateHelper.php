<?php

namespace App\Http\Controllers\Helpers;

use Ixudra\Curl\Facades\Curl;


class AffiliateHelper
{
    public function __construct()
    {
        $this->apiKey = config('affiliate.public_key');
        $this->authToken = config('affiliate.public_token');
        $this->baseUrl = "http://localhost:8086/wp-json/affwp/v1/affiliates";
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
    public function index()
    {
        $response = Curl::to($this->baseUrl)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->apiKey}:{$this->authToken}")
            ])
            ->asJson()
            ->get();
            dd($response);
        return $response;
    }
}
