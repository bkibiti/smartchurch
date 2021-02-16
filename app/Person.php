<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Person extends Model
{
    Protected $table = 'persons';

    protected $guarded = ["date_baptism","date_eucharist","date_confirmation","date_marriage","dob","date_communion","created_by","services"];
    

    public function group()
    {
        return $this->belongsToMany('App\Group', 'group_members');
    }

    public function pledges()
    {
        return $this->hasMany('App\Pledge', 'person_id','id');
    }

    public function dependants()
    {
        return $this->hasMany('App\PersonDependant', 'person_id', 'id');
    }

    public function marriageStatus()
    {
        return $this->belongsTo('App\MarriageStatus', 'marriage_status_id','id');
    }

    public function community() //jumuiya
    {
        return $this->belongsTo('App\Community', 'community_id','id');
    }

    public function kanda()
    {
        return $this->belongsTo('App\Kanda', 'kanda_id','id');
    }

    public function age($date){
        return Carbon::createFromDate($date)->age;
    }

}
