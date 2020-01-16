<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = ['id', 'User_id', 'service_id', 'status', 'booking_date', 'booking_time'];

}
