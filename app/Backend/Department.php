<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id','name','parent_id','description'
    ];

    public function dep_users(){
        return $this->hasMany('App\Backend\All_user');
    }
}
