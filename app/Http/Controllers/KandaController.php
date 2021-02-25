<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kigango;
use App\Kanda;


class KandaController extends Controller
{
   
    public function index()
    {
        $vigango = Kigango::all();
        $kanda = Kanda::all();
        return view('kanda.index', compact("vigango","kanda"));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'kigango_id' => 'required',
        ]);
        
        $k = new Kanda;
        $k->name = $request->name;
        $k->kigango_id = $request->kigango_id;
        $k->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }

 
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|min:4|max:50',
            'kigango_id' => 'required',
        ]);

        $kig = Kanda::find($request->id);
        $kig->name = $request->name;
        $kig->kigango_id = $request->kigango_id;
        $kig->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        try {
            Kanda::destroy($request->id);
            session()->flash("alert-success", "Taarifa imefutwa!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Kuna tatizo limetokea!");
            return back();
        }

    }
}
