<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class service_booked extends Model
{
    protected $fillable = ['id', 'booking_id', 'service_id', 'available_date', 'available_time', 'provide_id', 'receiver_id', 'role_id', 'booked_date', 'booked_time', 'status', 'description'];

}
