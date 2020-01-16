<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class User_education_detail extends Model
{
    protected $fillable = [
        'user_id','inst_name','inst_address','degree_id','faculty','board','passed_year','passed_division'
    ];

    public function degree(){
        return $this->hasMany('App\Backend\Degree','degree_id');
    }

    public function user_education(){
        return $this->belongsTo('App\Backend\All_user','user_id');
    }
}
