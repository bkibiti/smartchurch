<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\Kigango;
use App\Kanda;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $community = Community::all();
        $kanda = Kanda::all();
        return view('community.index', compact("community","kanda"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'kanda_id' => 'required',
        ]);
        
        $k = new Community;
        $k->name = $request->name;
        $k->kanda_id = $request->kanda_id;
        $k->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }

 
    public function update(Request $request, $id)
    {
     
         $request->validate([
            'name' => 'required|string|min:4|max:50',
            'kanda_id' => 'required',
        ]);

        $kig = Community::find($request->id);
        $kig->name = $request->name;
        $kig->kanda_id = $request->kanda_id;
        $kig->save();

        session()->flash("alert-success", "Taarifa imehifadhiwa!");
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        // dd($request->all());

        try {
            Community::destroy($request->id);
            session()->flash("alert-success", "Taarifa imefutwa!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Kuna tatizo limetokea!");
            return back();
        }

    }
}
