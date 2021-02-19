<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kanda extends Model
{
    Protected $table = 'ou_kanda';
    public $timestamps = false;

    public function kigango()
    {
        return $this->belongsTo('App\Kigango', 'kigango_id','id');
    }

}
