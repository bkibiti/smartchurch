<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    public function type()
    {
        return $this->belongsTo('App\FundActivity', 'fund_activity_id','id');
    }
}
