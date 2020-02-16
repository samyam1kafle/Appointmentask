<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_detail extends Model
{
    protected $fillable=['id','User-id','booked_id','cancel_id','reschedule_id','complete_id','booking_id'];

//    public function user_servicedetails(){
//        return $this->hasOne('App\Backend\All_User','User_id');
//    }

    public function booking_servicedetails(){
        return $this->hasOne('App\Backend\booking','booking_id');
    }

    public function servicebooked_servicedetails(){
        return $this->hasOne('App\Backend\service_booked','booked_id');
    }

    public function servicecancel_servicedetails(){
        return $this->hasOne('App\Backend\service_cancel','cancel_id');
    }

    public function servicecomplete_servicedetails(){
        return $this->hasOne('App\Backend\service_complete','complete_id');
    }

    public function servucereschedule_servicedetails(){
        return $this->hasOne('App\Backend\service_reschedule','reschedule_id');
    }

}
