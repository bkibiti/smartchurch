<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kigango;
use App\Parish;


class VigangoController extends Controller
{
    public function index()
    {
        $vigango = Kigango::all();
        $parish = Parish::all();
        return view('vigango.index', compact("vigango","parish"));
    }

  
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'parish_id' => 'required',
        ]);
        
        $kig = new Kigango;
        $kig->name = $request->name;
        $kig->parish_id = $request->parish_id;
        $kig->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }

 
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|min:4|max:50',
            'parish_id' => 'required',
        ]);

        $kig = Kigango::find($request->id);
        $kig->name = $request->name;
        $kig->parish_id = $request->parish_id;
        $kig->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        try {
            Kigango::destroy($request->id);
            session()->flash("alert-success", "Taarifa imefutwa!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Kuna tatizo limetokea!");
            return back();
        }

    }
}
