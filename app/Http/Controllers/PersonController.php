<?php

namespace App\Http\Controllers;

use App\Person;
use App\Service;
use App\PersonRole;
use App\PersonRelations;
use App\PersonDependant;
use App\MarriageStatus;
use App\Community;
use App\Kanda;


use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Http\Requests\StorePersonRequest;

class PersonController extends Controller
{
   
    public function index()
    {
        $people = person::where('status',3)->get();
        $kanda = Kanda::all();
        
        return view('people.index', compact("people","kanda"));
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

   
    public function search(Request $request)
    {
      
        $kanda = $request->kanda;
        $community = $request->community;


        if($request->kanda == 0){
            $kanda ='';
        }
        if($request->community == 0){
            $community = '';
        }
        $people = person::where('kanda_id','like', '%' . $kanda . '%')
                          ->where('community_id','like', '%' . $community . '%')
                          ->get();
        $kanda = Kanda::all();

        $request->flash('request',$request);    
        
        return view('people.index', compact("people","kanda"));
    }

   
 
 

    public function destroy(Person $person)
    {
        
    }



}
