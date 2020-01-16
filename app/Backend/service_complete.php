<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_complete extends Model
{
    protected $fillable = ['id', 'service_booked_id', 'service_reschedule_id', 'status', 'complete_date', 'complete_time'];

}
