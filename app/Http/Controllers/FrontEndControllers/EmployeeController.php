<?php

namespace App\Http\Controllers\FrontEndControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Todo;
use App\Backend\All_User;
use App\Backend\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    protected $Todo = null;
    protected $All_User = null;

    public function __construct(Todo $Todo, All_User $All_User)
    {
        $this->Todo = $Todo;
        $this->$All_User = $All_User;
    }

    public function GetList()
    {
        $user=@Auth::user()->id;
        $this->Todo=$this->Todo->where('assignedTo',$user)->get();
        return view('frontEnd/Employee/TaskList')->with('todo',$this->Todo);
    }

    public function GetTaskDetail(Request $request)
    {
        $data=$request->title;
        $this->Todo=$this->Todo->where('title',$request->title)->first();
        return view('frontEnd/Employee/TaskDetail')->with('todo',$this->Todo);
    }


}
