<?php

namespace App\Http\Controllers\Postflow;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Carbon\Carbon;
use App\Mail\CallMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class PostflowController extends Controller
{

    public function __construct()
    {
        $this->woocommerce = new Client(
            'http://localhost:8086/',
            'ck_5c61beb9d65b46f54f08fc2593353e4a982889e7',
            'cs_9c5c33ce0a75ba9f80c21481e199f3854e25d76d',
            [
                'wp_api' => true, // Enable the WP API integration
                'version' => 'wc/v3', // API version
                'query_string_auth' => true // Use query string for authentication
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enabledSocialList = getEnableSocialConnectorList();
        // $response = Http::withBasicAuth('ck_5c61beb9d65b46f54f08fc2593353e4a982889e7', 'cs_9c5c33ce0a75ba9f80c21481e199f3854e25d76d')
        //        ->get('http://localhost:8086/wp-json/wc/v3/products');

        // try {
        //     $response = $this->woocommerce->get('products');
        //     dd($response);
        // } catch (Throwable $e) {
        // dd($e->getResponse());
        // }
        return view('postflow.post', compact('enabledSocialList'));
    }

    private function getClient()
    {
        $client = new Google_Client();

        $keyFilePath = storage_path('app/google-calendar/client_id.json');

        if (!file_exists($keyFilePath)) {
            throw new \Exception('json file not found');
        }

        $client->setAuthConfig($keyFilePath);
        $client->setRedirectUri(URL::to('/') . '/meeting-callback');

        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);

        $client->setAccessType('offline');
        // $client->setPrompt('consent');
        $client->setApprovalPrompt('force'); // necessary for getting the refresh token
        $client->setIncludeGrantedScopes(true);

        $tokenPath = storage_path('app/google-calendar/token.json');

        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);

            if ($client->isAccessTokenExpired()) {
                // fetch new access token
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $client->setAccessToken($client->getAccessToken());
            }
        } else {
            $authUrl = $client->createAuthUrl();
            return $authUrl;
        }

        return $client;
    }

    /**
     * Redirect post page with regsiter to date via session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function redirectCreatePost(Request $request)
    {
        if($request->ajax()) {
            try {
                $createDate = $request->create_date ?? '';
                session()->put('post_create_date', $createDate);
                return response()->json(['status' => true]);
            } catch (Throwable $e) {
                return response()->json(['status' => false]);
            }
        }
    }

    public function getServerTime()
    {
        return response()->json([
            'server_date' => now()->toDateString(), // Format as YYYY-MM-DD
            'server_time' => now()->format('H') // Get the hour in 24-hour format (00 to 23)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function generateGoogleLink($email) {
        try {
            $client = $this->getClient();

            if (!$client instanceof Google_Client) {
                Session::put('googleMeetingEmail', $email);

                return response()->json([
                    'type' => "url",
                    'response' => $client
                ]);
            }

            $service = new Google_Service_Calendar($client);

            $event = new Google_Service_Calendar_Event(array(
                'summary' => 'Google Meeting',
                'location' => 'Spanish',
                'description' => 'About our service',
                'start' => array(
                    'dateTime' => Carbon::now()->format('c'),
                    'timeZone' => 'America/Los_Angeles',
                ),
                'end' => array(
                    'dateTime' => Carbon::now()->addMinutes(60)->format('c'),
                    'timeZone' => 'America/Los_Angeles',
                ),
                'conferenceData' => [
                    'createRequest' => [
                        'requestId' => uniqid(),
                    ]
                ],
                'recurrence' => array(
                    'RRULE:FREQ=DAILY;COUNT=2'
                ),
                'attendees' => array(
                    array('email' => $email),
                ),
            ));

            $calendarId = 'primary';
            $eventResult = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
            // Get the Google Meet link
            // $meetLink = $eventResult->getHangoutLink();

            return response()->json([
                'type' => "status",
                'response' => 'success'
            ]);
        } catch (error) {
            return response()->json([
                'type' => "status",
                'response' => 'faild'
            ]);
        }
    }

    public function meetingCallback(Request $request) {
        // $authCode = $request['code'];

        // $client = new Google_Client();
        // $keyFilePath = storage_path('app/google-calendar/client_id.json');
        // $client->setAuthConfig($keyFilePath);
        // $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // if (array_key_exists('error', $accessToken)) {
        //     throw new \Exception('Error during token exchange: ' . join(', ', $accessToken));
        // }

        // $tokenPath = storage_path('app/google-calendar/token.json');
        // // Save the token to a file for future use
        // file_put_contents($tokenPath, json_encode($client->getAccessToken()));

        // $googleMeetingEmail = Session::get('googleMeetingEmail');

        // $this->generateGoogleLink($googleMeetingEmail);

        return redirect()->to("/postflow")->withMessage('Password changed successfully!');
    }

    public function sendCallRequest(Request $request)
    {
        // $toSendMailAddress = $request['email'];
        $toSendMailAddress = 'super@localhost.com';
        $email = Auth::user()->email;

        $toSendMailData;

        if(Auth::user()->hasRole('administrator')) {
            $toSendMailData = [
                'content' => 'This is google meeting link',
                'email' => 'To ' . $request['email']
            ];

            return $this->generateGoogleLink($request['email']);

        } else {
            $toSendMailData = [
                'content' => 'The' . $email . ' sent google meeting request!',
                'email' => $email
            ];

            try {
                @Mail::to('super@localhost.com')->send(new CallMail($toSendMailData));

                return response()->json([
                    'type' => "status",
                    'response' => 'success'
                ]);
            } catch (error) {
                return response()->json([
                    'type' => "status",
                    'response' => 'faild'
                ]);
            }
        }
    }/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
