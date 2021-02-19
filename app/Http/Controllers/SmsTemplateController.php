<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmsTemplate;

class SmsTemplateController extends Controller
{
    public function getTemplate()
    {
        $sms = SmsTemplate::all();
        return view('sms.templates',compact("sms"));
    }

    public function createTemplate()
    {
        return view('sms.template_create');
    }

    public function storeTemplate(Request $request)
    {
     
        $request->validate([
            'title' => 'required|string|max:30',
            'message' => 'required|string',
        ]);


        $sms = new SmsTemplate;
        $sms->title = $request->title;
        $sms->message = $request->message;
        $sms->save();

        session()->flash("alert-success", "Taarifa zimehifadhiwa!");
        return redirect()->route('template.get');
    }

    public function editTemplate($id)
    {
        $sms = SmsTemplate::find($id);
        return view('sms.template_edit',compact("sms"));
    }

    public function updateTemplate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'message' => 'required|string',
        ]);

        $sms = SmsTemplate::find($request->id);
        $sms->title = $request->title;
        $sms->message = $request->message;
        $sms->save();

        session()->flash("alert-success", "Taarifa zimehifadhiwa!");
        return redirect()->route('template.get');
    }

    public function deleteTemplate(Request $request)
    {

        try {
            SmsTemplate::destroy($request->id);
            session()->flash("alert-success", "Taarifa imefutwa!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Kuna tatizo limetokea!");
            return back();
        }

    }



}

