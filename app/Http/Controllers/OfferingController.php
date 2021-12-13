<?php

namespace App\Http\Controllers;

use App\Offering;
use App\FundActivity;
use Auth;

use Illuminate\Http\Request;

class OfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offering = Offering::All();
        return view('offerings.index', compact("offering"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fundActivity = FundActivity::where('status','1')->get();
      
        return view('offerings.create', compact("fundActivity"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offering = new Offering;

        $offering->fund_activity_id = $request->activity_id;
        $offering->offering_date = toDbDateFormat($request->pay_date);
        $offering->amount = $request->amount;
        $offering->created_by = Auth::user()->id;
        $offering->updated_by = Auth::user()->id;
        $offering->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('offerings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function show(Offering $offering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function edit(Offering $offering)
    {
        $fundActivity = FundActivity::where('status','1')->get();
        return view('offerings.edit', compact("offering","fundActivity"));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offering $offering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offering $offering)
    {
        //
    }
}
