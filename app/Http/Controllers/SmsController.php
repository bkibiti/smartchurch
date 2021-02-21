<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\SmsTemplate;
use App\SmsOutbox;
use App\Community;
use App\Kigango;
use App\Kanda;
use App\Person;
use App\SmsBundle;
use App\SmsBalance;
use DB;

use Auth;
use Carbon\Carbon;

class SmsController extends Controller
{
    public function dashboard()
    {
        $trends =DB::select("SELECT DAY(created_at) day, count(*) count FROM sms_outbox 
                             WHERE MONTH(created_at) = MONTH(now())  GROUP BY DAY(created_at)");
        $values = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
        foreach ($trends as $value) {
            $values[$value->day-1] = $value->count;
        }

        $outbox = SmsOutbox::whereRaw('MONTH(created_at) = MONTH(now())')->count();
        $balance = SmsBalance::first();
     
        return view('sms.dashboard',compact("values","outbox","balance"));
    }

    public function create()
    {
        $tempate = SmsTemplate::all();
        return view('sms.send',compact("tempate"));
    }


    public function analyse(Request $request)
    {
        $request->validate([
            'receiver' => 'required',
            'message' => 'required|string',
        ]);
    

        if($request->sendto == 1){  //Kigango
            $data = Person::select('name','mobile_phone','kanda_id')->whereIn('kanda_id',$request->receiver)->get();
        }
        if($request->sendto == 2){  //Kanda
            $data = Person::select('name','mobile_phone','kanda_id')->whereIn('kanda_id',$request->receiver)->get();
        }
        if($request->sendto == 3){  //Jumuiya
            $data = Person::select('name','mobile_phone','community_id')->whereIn('community_id',$request->receiver)->get();
        }

        $receiver=[];
       
        foreach ($data as $value) {
            array_push($receiver,$value->mobile_phone);
        }

        $balance = SmsBalance::first();
       
        $message = $request->message;
        $num_receivers = count($receiver);
        $smsCount = $request->smsCount;
        $totalSMS = (int)$smsCount * (int)$num_receivers;
        $totalSmsAccount = $balance->balance;
        return view('sms.analyse',compact("smsCount","totalSMS","receiver","num_receivers","message","totalSmsAccount"));
    }

    public function send(Request $request)
    {

        $to = explode(',', $request->receiver);

        $response = Http::asForm()
                    ->withBasicAuth('cybergen', 'Cyb3rgen@123')
                    ->post('https://messaging-service.co.tz/api/sms/v1/test/text/single', [
            'from' => 'SmartChurch',
            'to' =>  $to,  //["255655912841"],
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

        //update balance
        $smsBal = SmsBalance::find(1);
        $currentBalance = $smsBal->balance;
        $smsBal->balance =  $currentBalance - $request->totalSMS;
        $smsBal->save();
        
        session()->flash("alert-success", "Ujumbe Umetumwa!");
      
        return redirect()->route('sms.dashboard');
    }

    public function outbox()
    {
        $outbox = SmsOutbox::all();
        return view('sms.outbox',compact("outbox"));
    }

    public function getReceiver(Request $request){
        if($request->id == 1){  //Kigango
            $data = Kigango::select('id','name')->get();
        }
        if($request->id == 2){  //Kanda
            $data = Kanda::select('id','name')->get();
        }
        if($request->id == 3){  //Jumuiya
            $data = Community::select('id','name')->get();
        }
        if($request->id == 4){  //Waumini
            $data = Person::select('id','name')->get();
        }
      

        foreach ($data as $value) {
            $dataz["$value->id"] = $value->name;
        }
        return  $dataz;
    }


    public function createPayment()
    {
        $SmsBundle = SmsBundle::all();
        return view('sms.payment',compact("SmsBundle"));
    }


}
