<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['id', 'name', 'User_id', 'Department_id', 'Service_description'];

    public function user_service(){
        return $this->hasOne('App\Backend\All_User','User_id');
    }

    public function ser_depart(){
        return $this->hasOne('App\Backend\Department','Department_id');
    }
}
