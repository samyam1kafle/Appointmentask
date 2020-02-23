<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['User_id' ,'Todo_id','comment'];

    public function User()
    {
        return $this->belongsTo('App\Backend\All_User', 'User_id');
    }
    public function Todo()
    {
        return $this->belongsTo('App\Backend\Todo', 'Todo_id');
    }
}
