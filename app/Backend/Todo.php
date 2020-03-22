<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'User_id', 'title', 'description', 'assignedDate', 'CompletedDate', 'assignedTo', 
        'requestedBy','reassignedto','DeadLine', 'status','remarks','reAssignedTo','reDeadLine'
    ];
    public function user_todo(){
        return $this->belongsTo('App\Backend\All_User','User_id');
    }
    public function superadmin(){
        return $this->belongsTo('App\Backend\All_User','requestedBy');
    }

    public function employee(){
        return $this->belongsTo('App\Backend\All_User','assignedTo');
    }
    public function reassignto(){
        return $this->belongsTo('App\Backend\All_User','reassignedto');
    }
    public function Todo(){
        return $this->hasMany('App\Backend\Comment');
    }
}
