<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['id', 'name', 'User_id', 'Department_id', 'Service_description'];

}
