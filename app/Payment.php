<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person', 'person_id','id');
    }

    public function activity()
    {
        return $this->belongsTo('App\FundActivity', 'activity_id','id');
    }

    public function payMethod()
    {
        return $this->belongsTo('App\PaymentMethod', 'payment_method_id','id');
    }


}
