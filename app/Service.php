<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public $timestamps = false;
    Protected $table = 'vyama_kitume';



    public function members()
    {
        return $this->belongsToMany('App\Person', 'group_members')->withPivot('position_id');
    }

    public function countMembers()
    {
        return $this->members()->count();
    }
}
