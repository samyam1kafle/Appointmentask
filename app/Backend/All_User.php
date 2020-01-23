<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class All_User extends Auth
{
    protected $fillable = [
        'id', 'name', 'email', 'role_id', 'password'
        , 'image', 'status', 'gender', 'service_id',
        'department_id', 'available_date'

    ];

    public function roles()
    {
        return $this->belongsTo('App\Backend\roles', 'role_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Backend\Department', 'department_id');
    }

    public function education(){
        return $this->hasMany('App\Backend\User_education_detail');
    }

    public function personal_detail(){
        return $this->hasMany('App\Backend\User_personal_detail');
    }

    public function available_date_time(){
        return $this->belongsToMany('App\Backend\date_time','date_times');
    }

    public function todos(){
        return $this->hasMany('App\Backend\Todo');
    }

    public function services(){
        return $this->hasOne('App\Backend\Service','service_id');
    }

    public function booking(){
        return $this->hasMany('App\Backend\booking');
    }
}
