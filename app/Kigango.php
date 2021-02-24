<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kigango extends Model
{
    Protected $table = 'ou_vigango';
    public $timestamps = false;

    public function parish()
    {
        return $this->belongsTo('App\Parish', 'parish_id','id');
    }

}
