<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    Protected $table = 'ou_communities';
    public $timestamps = false;

    public function kanda()
    {
        return $this->belongsTo('App\Kanda', 'kanda_id','id');
    }

}
