<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class date_time extends Model
{
    protected $fillable=['id','User_id','Date_id','Time_id'];

    public function Date(){
        return $this->hasMany('App\Backend\Available_date','Date_id');
    }

    public function Time(){
        return $this->hasMany('App\Backend\Available_Time','Time_id');
    }

    public function User_Id_date(){
        return $this->hasMany('App\Backend\All_User','User_id');
    }
}
