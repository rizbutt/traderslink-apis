<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Queries;
use App\Models\User;
use App\Models\Vendor_Details;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = Validator::make($request->all(), [
            'sender_name' => ['required', 'string', 'max:255'],
            'sender_phone_number' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:8'],
            'content' => ['required', 'string', 'max:2048'],
            ]);
            $data = $data->safe()->collect();
            Queries::create([
                'user_id' => 'guest',
                'sender_name' => $data['sender_name'],
                'sender_phone_number' => $data['sender_phone_number'],
                'type' => $data['type'],
                'content' => $data['content'],
            ]);

            $FcmToken = array();
            $url = 'https://fcm.googleapis.com/fcm/send';
            $verndors = Vendor_Details::where('dealin', $data['type'])->get();
            foreach($verndors as $verndor){
                $device_token = User::whereNotNull('device_key')->where('id', $verndor->user_id)->pluck('device_key')->first();
                if (! $device_token) { 
                    $FcmToken = $FcmToken;
                }else{
                    array_push($FcmToken,$device_token);
                }
            }
            $serverKey = 'AAAAcguCbGc:APA91bE8eD1_zfuFdQKCzTGChn06hCwwK_Ju8S6xNwqMmf9vmdODrqhJfs7zbQT2jshKeXak0D7T7_7usU7XPK_mSiZ8Oak8fstzTNtjbDkFgThj6WDUqyVKgRihG8g-fRNegtLapxOV';

            $data = [
                "registration_ids" => $FcmToken,
                "notification" => [
                    "title" => $data['sender_phone_number'],
                    "body" => $data['content'],
                    "icon" =>  asset('images/logo.svg'),
                    "click_action" =>  'home'
                ]
            ];

            $encodedData = json_encode($data);
    
            $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
          
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }        
            // Close connection
            curl_close($ch);
            // FCM response
            return view('querythanks');
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

    /**
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
