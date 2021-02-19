<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\Kigango;
use App\Kanda;

class OuController extends Controller
{
    public function getKanda(Request $request){
        
        $kanda = Kanda::where('kigango_id', $request->id)->get();

        foreach ($kanda as $value) {
            $kandas["$value->id"] = $value->name;
        }
        return  $kandas;
    }

    public function getCommunity(Request $request){
        
        $community = Community::where('kanda_id', $request->id)->get();

        foreach ($community as $value) {
            $communities["$value->id"] = $value->name;
        }
        return  $communities;
    }
}
