<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'degree_name'
    ];

    public function User_education(){
        return $this->hasMany('App\Backend\User_education_detail');
    }
}
