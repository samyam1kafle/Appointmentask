<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_cancel extends Model
{
    protected $fillable=['id','status','Booked_id'];

}
