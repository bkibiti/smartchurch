<?php

namespace App\Http\Controllers;

use App\Person;
use App\Service;
use App\PersonRole;
use App\PersonRelations;
use App\PersonDependant;
use App\MarriageStatus;
use App\Community;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Http\Requests\StorePersonRequest;

class PersonController extends Controller
{
   
    public function index()
    {
        $people = person::where('status',3)->get();
        return view('people.index', compact("people"));
    }

 
    public function create()
    {
        $members = Person::select('id','name','gender')->get();
        $relations = PersonRelations::all();
        $marriageStatus = MarriageStatus::all();
        $Community = Community::all();

        return view('people.create',compact('members','relations','marriageStatus','Community'));
    }

   
    public function store(StorePersonRequest $request)
    {
        $person = new Person;
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->date_communion = toDbDateFormat($request->date_communion);
        $person->status = 3;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();

        session()->flash("alert-success", "Taarifa zimehifadhiwa!");
        return redirect()->route('dependants.create',$person->id);
    }

 
    public function show(Person $person)
    {
        return view('people.show',compact('person'));
    }

   
    public function edit(Person $person)
    {
        
        $members = Person::select('id','name','gender')->get();
        $marriageStatus = MarriageStatus::all();
        $Community = Community::all();

        return view('people.edit',compact('person','members','marriageStatus','Community'));
    }

 
    public function update(Request $request, Person $person)
    {
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->date_communion = toDbDateFormat($request->date_communion);
        $person->status = 3;
        $person->updated_by = Auth::user()->id;
        $person->save();
        
        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('people.index');
    }

    public function pending()
    {
        $people = person::where('status',1)->get();
        return view('people.pending', compact("people"));
    }
    public function search(Request $request)
    {
        $people = person::where('status',$request->status)->get();
        $request->flash('request',$request);    
        return view('people.pending', compact("people"));
    }

    public function approve(Request $request)
    {
      
        if($request->selection == 0){
            $status = 2;
            $msg = 'Taarifa Imekataliwa!';
        }
        if($request->selection == 1){
            $status = 3;
            $msg = 'Taarifa Imehakikiwa!';
        }
        
        $person = person::find($request->person_id);
        $person->status = $status;
        $person->approval_note = $request->approval_note;
        $person->approved_by = Auth::user()->id;
        $person->approved_at = Carbon::now();
        $person->save();
        session()->flash("alert-success", $msg);
        return redirect()->route('people.pending');
    }

    public function destroy(Person $person)
    {
        //
    }
}
