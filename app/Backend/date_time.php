<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class date_time extends Model
{
    protected $fillable=['id','User_id','date','time'];


    public function User_Id_date(){
        return $this->hasMany('App\Backend\All_User','User_id');
    }

    public function Date_Available(){
        return $this->belongsTo('App\Backend\Available_date','date_id');
    }
}
