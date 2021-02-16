<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\PersonDependant;

use App\PersonRelations;

class DependantsController extends Controller
{

    public function index()
    {
        $dependants = PersonDependant::all();
        $person = Person::select('id','name','address','mobile_phone')->get();
        $relations = PersonRelations::all();

        return view('people.dependants_list', compact("dependants",'person','relations'));
    }

    public function create($id)
    {
        $dependants = PersonDependant::where('person_id',$id)->get();
        $relations = PersonRelations::all();
        $person_id = $id;
        $person = person::select('name')->where('id',$id)->first();
        $parent_name = $person->name;

        session()->flash("alert-success", "Taarifa zimehifadhiwa!");
        return view('people.dependants', compact("dependants",'relations','person_id','parent_name'));
    }


    public function store(Request $request)
    {
        $dependant = new PersonDependant;
        $dependant->name = $request->name;
        $dependant->gender = $request->gender;
        $dependant->dob = toDbDateFormat($request->dob);
        $dependant->person_id = $request->person_id;
        $dependant->relation_id = $request->relation_id;
        $dependant->save();

        $person_id = $request->person_id;
        $parent_name = $request->parent_name;
        $dependants = PersonDependant::where('person_id',$person_id)->get();
        $relations = PersonRelations::all();

        return view('people.dependants', compact("dependants",'relations','person_id','parent_name'));
    }

    public function store2(Request $request)
    {
        $dependant = new PersonDependant;
        $dependant->name = $request->name;
        $dependant->gender = $request->gender;
        $dependant->dob = toDbDateFormat($request->dob);
        $dependant->person_id = $request->person_id;
        $dependant->relation_id = $request->relation_id;
        $dependant->save();

        $dependants = PersonDependant::all();
        $person = Person::select('id','name','address','mobile_phone')->get();
        $relations = PersonRelations::all();

        session()->flash("alert-success", "Taarifa zimehifadhiwa!");
        return view('people.dependants_list', compact("dependants",'person','relations'));
    
    }
    public function delete(Request $request)
    {
        PersonDependant::destroy($request->id);

        session()->flash("alert-success", "Mtegemezi ameondolewa!");
        return back();
    
    }
    
}
