<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsOutbox extends Model
{
    Protected $table = 'sms_outbox';
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User', 'created_by','id');
    }
}
