<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_detail extends Model
{
    protected $fillable=['id','User-id','booked_id','cancel_id','reschedule_id','complete_id','booking_id'];

}
