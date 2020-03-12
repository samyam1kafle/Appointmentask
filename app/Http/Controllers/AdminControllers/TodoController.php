<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\Roles;
use App\Events\todoEvent;
use App\Notifications\taskAppointed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\todoValidator;
use App\Backend\Todo;
use App\Backend\All_User;
use App\Backend\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailUser;
use Thread;


class TodoController extends Controller
{
    protected $Todo = null;
    protected $All_User = null;
    protected $Comment = null;

    public function __construct(Todo $Todo, All_User $All_User, Comment $Comment)
    {
        $this->Todo = $Todo;
        $this->All_User = $All_User;
        $this->Comment = $Comment;
    }

    public function index()
    {


        $this->Todo = $this->Todo->get();
        $superAdmin = Roles::where('name', '=', 'super_admin')->first();
        $employee = Roles::where('name', '=', 'employee')->first();

        $superAdmin = All_User::where('role_id', '=', $superAdmin->id)->get();
        $employee = All_User::where('role_id', '=', $employee->id)->get();
        return view('Admin.Todo.index')->with('Todos', $this->Todo)->with('superadmin', $superAdmin)->with('employee', $employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $d=Carbon::now();
        $superAdmin= Roles::where('name','=','super_admin')->first();
        $employee= Roles::where('name','=','employee')->first();

        $superAdmin= All_User::where('role_id','=',$superAdmin->id)->get();
        $employee= All_User::where('role_id','=',$employee->id)->get();
        return view('Admin.Todo.create')->with('superadmin',$superAdmin)->with('employee',$employee)->with('d',$d);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(todoValidator $request,All_User $thread)
    {
        $data = $request->all();
       /* dd($data);*/
        $this->Todo->fill($data,$request->assignedDate);
        /*$this->Todo->fill($d);*/
        $success = $this->Todo->save();

//                dd($assig_user);

        if ($success) {
            $assigned_usr = $this->Todo->assignedTo;
            $assig_user = All_User::find($assigned_usr);
            $user_assigning_task = All_User::find($this->Todo->User_id);
            $thread = $this->Todo;
//            $user_thread = $user_assigning_task;
//            dd($user_thread);

            $assig_user->notify(new taskAppointed($thread));
//            ,$user_thread
            request()->session()->flash('success', 'ToDos list added successfully');

        } else {
            request()->session()->flash('error', 'sorry there was an error adding ToDos list');
        }

        Mail::to($assig_user->email)->send(new MailUser());
        return redirect()->route('Todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->Todo = $this->Todo->find($id);
        if (!$this->Todo) {
            request()->session()->flash('error', 'Todos list not found');
            return redirect()->route('Todo.index');
        }
        $superAdmin = Roles::where('name', '=', 'super_admin')->first();
        $employee = Roles::where('name', '=', 'employee')->first();

        $superAdmin = All_User::where('role_id', '=', $superAdmin->id)->get();
        $employee = All_User::where('role_id', '=', $employee->id)->get();
        return view('admin.Todo.update')->with('Todo', $this->Todo)->with('superadmin', $superAdmin)->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(todoValidator $request, $id)
    {
        
        $this->Todo = $this->Todo->find($id);
        if (!$this->Todo) {
            request()->session()->flash('error', 'Todos not found');
            return redirect()->route('Todo.index');
        }
        $data = $request->all();
        $this->Todo->fill($data);
        $success = $this->Todo->save();
        if ($success) {
            request()->session()->flash('success', 'Todos list updated successfully');

        } else {
            request()->session()->flash('error', 'sorry there was an error updating Todos list');
        }
        $assigned_usr = $this->Todo->assignedTo;
        $assig_user = All_User::find($assigned_usr);
        $thread = $this->Todo;        
        $assig_user->notify(new taskAppointed($thread));

        Mail::to($assig_user->email)->send(new MailUser());
        return redirect()->route('Todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Todo = $this->Todo->find($id);
        if (!$this->Todo) {
            request()->session()->flash('error', 'Todos list not found');
            return redirect()->route('Todo.index');
        }
        $success = $this->Todo->delete();
        if ($success) {
            request()->session()->flash('success', 'Todos list deleted successfully');

        } else {
            request()->session()->flash('error', 'sorry there was an error deleting Todos list');
        }
        return redirect()->route('Todo.index');
    }

    public function pending(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = 0;
        $todo->CompletedDate = null;
        $todo->update();
        return redirect()->back()->with('delete', 'status changed');
    }

    public function complete(Request $request, $id)
    {
//      dd($request->all());

        $todo = Todo::findOrFail($id);
        $todo->status = 1;
        $todo->CompletedDate = date("Y-m-d H:i:s");
        $todo->update();
        return redirect()->back()->with('delete', 'status changed');
    }

    public function reaassign($id)
    {
        $this->Todo = $this->Todo->find($id);
        $superAdmin = Roles::where('name', '=', 'super_admin')->first();
        $employee = Roles::where('name', '=', 'employee')->first();

        $superAdmin = All_User::where('role_id', '=', $superAdmin->id)->get();
        $employee = All_User::where('role_id', '=', $employee->id)->get();
        return view('admin.Todo.Re-Assign')->with('Todo', $this->Todo)->with('superadmin', $superAdmin)->with('employee', $employee);

    }

    public function ReAssign(Request $request, $id)
    {

        $todo = Todo::findOrFail($id);
        $todo->reassignedto = $request->reassignedto;
        $update = $todo->update();
        return redirect()->route('Todo.index')->with('success', 'Task Re-assigned');

    }

    public function GetTaskDetail(Request $request)
    {

        $this->Todo=$this->Todo->where('title',$request->title)->first();
        $d=Carbon::now();
        $id=$this->Todo->id;
        $this->Comment=$this->Comment->where('Todo_id',$id)->get();
        return view('Admin/Todo/Detail')->with('todo',$this->Todo)->with('comment',$this->Comment)->with('d',$d);

    }
   
}
