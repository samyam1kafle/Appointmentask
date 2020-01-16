<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class All_User extends Model
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
}
