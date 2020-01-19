<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'User_id', 'title', 'description', 'assignedDate', 'CompletedDate', 'assignedTo', 'requestedBy', 'DeadLine', 'status'
    ];
    public function user_todo(){
        return $this->belongsTo('App\Backend\All_User','User_id');
    }
}
