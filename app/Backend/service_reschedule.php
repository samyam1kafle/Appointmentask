<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_reschedule extends Model
{
    protected $fillable = ['id', 'status', 'Reschedule_date', 'Reschedule_time', 'Available_date_id', 'Available_time_id',];

}
