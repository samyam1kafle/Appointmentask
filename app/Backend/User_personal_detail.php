<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class User_personal_detail extends Model
{
    protected $fillable = [
        'user_id','address1', 'address2',
        'phone1', 'phone2','appointment_status','date_of_birth'
    ];

    public function user_details(){
        return $this->belongsTo('App\Backend\All_User','user_id');
    }
}
