<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\todoValidator;
use App\Backend\Todo;
use App\Backend\All_User;


class TodoController extends Controller
{
    protected $Todo = null;
    protected $All_User = null;

    public function __construct(Todo $Todo, All_User $All_User)
    {
        $this->Todo = $Todo;
        $this->All_User = $All_User;
    }

    public function index()
    {
        $this->Todo = $this->Todo->get();
        $superAdmin= Roles::where('name','=','super_admin')->first();
        $employee= Roles::where('name','=','employee')->first();

        $superAdmin= All_User::where('role_id','=',$superAdmin->id)->get();
        $employee= All_User::where('role_id','=',$employee->id)->get();
        return view('Admin.Todo.index')->with('Todos', $this->Todo)->with('superadmin',$superAdmin)->with('employee',$employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $superAdmin= Roles::where('name','=','super_admin')->first();
        $employee= Roles::where('name','=','employee')->first();

        $superAdmin= All_User::where('role_id','=',$superAdmin->id)->get();
        $employee= All_User::where('role_id','=',$employee->id)->get();
        return view('Admin.Todo.create')->with('superadmin',$superAdmin)->with('employee',$employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(todoValidator $request)
    {
        $data = $request->all();
        $this->Todo->fill($data);
        $success = $this->Todo->save();
        if ($success) {
            request()->session()->flash('success', 'ToDos list added successfully');

        } else {
            request()->session()->flash('error', 'sorry there was an error adding ToDos list');
        }
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
        $superAdmin= Roles::where('name','=','super_admin')->first();
        $employee= Roles::where('name','=','employee')->first();

        $superAdmin= All_User::where('role_id','=',$superAdmin->id)->get();
        $employee= All_User::where('role_id','=',$employee->id)->get();
        return view('admin.Todo.update')->with('Todo', $this->Todo)->with('superadmin',$superAdmin)->with('employee',$employee);
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
        $todo->status=0;
        $todo->CompletedDate = null;
        $todo->update();
        return redirect()->route('Todo.index')->with('delete','status changed');
    }

    public function complete(Request $request ,$id){
//      dd($request->all());

        $todo = Todo::findOrFail($id);
        $todo->status=1;
        $todo->CompletedDate = date("Y-m-d H:i:s");
        $todo->update();
        return redirect()->route('Todo.index')->with('delete','status changed');
    }

    public function reaassign($id){
        $this->Todo = $this->Todo->find($id);
        $superAdmin= Roles::where('name','=','super_admin')->first();
        $employee= Roles::where('name','=','employee')->first();

        $superAdmin= All_User::where('role_id','=',$superAdmin->id)->get();
        $employee= All_User::where('role_id','=',$employee->id)->get();
        return view('admin.Todo.Re-Assign')->with('Todo', $this->Todo)->with('superadmin',$superAdmin)->with('employee',$employee);

    }

    public function ReAssign(Request $request ,$id){

        $todo = Todo::findOrFail($id);
        $todo->reassignedto=$request->reassignedto;
        $update=$todo->update();
        return redirect()->route('Todo.index')->with('success','Task Re-assigned');

    }
}
