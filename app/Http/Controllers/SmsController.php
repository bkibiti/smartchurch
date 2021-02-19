<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\SmsTemplate;
use App\SmsOutbox;
use Auth;
use Carbon\Carbon;

class SmsController extends Controller
{
    public function create()
    {
        $tempate = SmsTemplate::all();
        return view('sms.send',compact("tempate"));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver' => 'required',
            'message' => 'required|string',
        ]);
        

        $response = Http::asForm()
                    ->withBasicAuth('cybergen', 'Cyb3rgen@123')
                    ->post('https://messaging-service.co.tz/api/sms/v1/test/text/single', [
            'from' => 'SmartChurch',
            'to' => ["255655912841", "255716718040","255716718044"], //$request->receiver,
            'text' => $request->message
        ]);

       
        
        $batch = SmsOutbox::max('batch') + 1;
        $data =[];

        foreach ($response->json()["messages"] as $response) {
            $msg = array(
                'message_id' => $response["messageId"],
                'sender' => "SmartChurch",
                'batch' => $batch,
                'message' =>  $request->message,
                'recipient' => $response["to"],
                'status' => $response["status"]["name"],
                'created_at' => Carbon::now('Africa/Nairobi'),
                'created_by' => Auth::user()->id,
            );

            array_push($data, $msg);
        } 

        SmsOutbox::insert($data);
        dd($data);
        $sms = new SmsOutbox;
        // $sms->message_id = $response["messageId"];
        // $sms->sender = "SmartChurch";
        // $sms->message =  $request->message;
        // $sms->recipient = $response["to"];
        // $sms->status = $response["status"]["name"];
        // $sms->created_at = Carbon::now('Africa/Nairobi');
        // $sms->created_by = Auth::user()->id;
        // $sms->save();

    }

    public function outbox()
    {
        $outbox = SmsOutbox::all();
        return view('sms.outbox',compact("outbox"));
    }



}
