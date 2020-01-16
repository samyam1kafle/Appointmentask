<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class User_work_detail extends Model
{
    protected $fillable = [
        'user_id','profession', 'work_exp', 'org_name',
        'org_address', 'document', 'org_pan' ,'fee' ,'phone_1','phone_2'
    ];

    public function user_work_details(){
        return $this->belongsTo('App\Backend\All_user','user_id');
    }
}
