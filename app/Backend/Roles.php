<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'id','name','description'
    ];

    public function users(){
        return $this->hasMany('App\Backend\All_User');
    }
}
