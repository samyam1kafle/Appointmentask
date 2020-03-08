<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Todo;
use App\Backend\All_User;
use App\Backend\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Backend\Comment;
class EmployeeController extends Controller
{
    protected $Todo = null;
    protected $All_User = null;
    protected $Comment = null;

    public function __construct(Todo $Todo, All_User $All_User,Comment $Comment)
    {
        $this->Todo = $Todo;
        $this->$All_User = $All_User;
        $this->Comment = $Comment;
    }

    public function GetList()
    {
        $user=@Auth::user()->id;
        $this->Todo=$this->Todo->where('assignedTo',$user)/*->where('reassignedto',$user)*/->get();
        return view('Admin/TaskView/list')->with('todo',$this->Todo);
    }

    public function GetTaskDetail(Request $request)
    {
        $user=@Auth::user()->id;
        $this->Todo=$this->Todo->where('id',$request->id)->first();
        $id=$this->Todo->id;
        $this->Comment=$this->Comment->where('Todo_id',$id)->get();
        return view('Admin/TaskView/Detail')->with('todo',$this->Todo)->with('comment',$this->Comment);
    }

}
