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
        $this->Todo=$this->Todo->where('title',$request->title)->first();
        $id=$this->Todo->id;
        $this->Comment=$this->Comment->where('Todo_id',$id)->get();
        return view('Admin/TaskView/Detail')->with('todo',$this->Todo)->with('comment',$this->Comment);
    }

    public function complete(Request $request ,$id){
        $todo = Todo::findOrFail($id);
        $todo->status=1;
        $todo->CompletedDate = date("Y-m-d H:i:s");
        $todo->update();
        return redirect()->back()->with('delete','status changed');
    }
    public function pending(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status=0;
        $todo->CompletedDate = null;
        $todo->update();
        return redirect()->back()->with('delete','status changed');
    }


}
