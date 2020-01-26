<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Available_time extends Model
{
    protected $fillable=['id','date_id','time'];

    public function Date_Available(){
        return $this->belongsTo('App\Backend\Available_date','date_id');
    }
}

