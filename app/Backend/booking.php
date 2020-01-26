<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = ['id', 'User_id', 'service_id', 'status', 'booking_date', 'booking_time'];

    public function user_booking(){
        return $this->belongsTo('App\Backend\All_User','User_id');
    }

    public function ser_booking(){
        return $this->belongsTo('App\Backend\Service','service_id');
    }
}
