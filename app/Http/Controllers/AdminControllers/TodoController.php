<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\todoValidator;
use App\Backend\Todo;



class TodoController extends Controller
{
    protected $Todo=null;

    public function __construct(Todo $Todo)
    {
        $this->Todo=$Todo;
    }

    public function index()
    {
        $this->Todo=$this->Todo->get();
        return view('Admin.Todo.index')->with('Todos', $this->Todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $this->Todo->fill($data);
        $success=$this->Todo->save();
        if($success){
            request()->session()->flash('success','ToDos list added successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error adding ToDos list');
        }
        return redirect()->route('Todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->Todo=$this->Todo->find($id);
        if(!$this->Todo){
            request()->session()->flash('error','Todos list not found');
            return redirect()->route('Todo.index');
        }
        return view('admin.Todo.update')->with('Todo',$this->Todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->Todo=$this->Todo->find($id);
        if(!$this->Todo){
            request()->session()->flash('error','Todos not found');
            return redirect()->route('Todo.index');
        }
        $data=$request->all();
        $this->Todo->fill($data);
        $success=$this->Todo->save();
        if($success){
            request()->session()->flash('success','Todos list updated successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error updating Todos list');
        }
        return redirect()->route('Todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Todo=$this->Todo->find($id);
        if(!$this->Todo){
            request()->session()->flash('error','Todos list not found');
            return redirect()->route('Todo.index');
        }
        $success=$this->Todo->delete();
        if($success){
            request()->session()->flash('success','Todos list deleted successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error deleting Todos list');
        }
        return redirect()->route('Todo.index');
    }
}
