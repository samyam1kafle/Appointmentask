<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Department;
use App\Http\Requests\DepartmentValidator;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::orderBy('id','desc')->get();
        return view('Admin/Departments/index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::orderBy('id','desc')->get();
        return view('Admin/Departments/create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentValidator $request)
    {   
       
        $data = Department::create($request->all());
        if($data){
            return redirect()->route('department.index')->with('success','Department has been created Successfully');
        }
        
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
        $department = Department::all();
        $depart_id = Department::findOrFail($id);
        return view('Admin/Departments/edit', compact('department','depart_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentValidator $request, $id)
    {
        $department = Department::find($id);

        $department->name = $request->name;
        $department->parent_id = $request->parent_id;
        $department->description = $request->description;
        
        $update = $department->save();
        
        if($update){
            return redirect()->route('department.index')->with('success', 'Department has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating departments'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')->with('completed', 'Selected Department has been deleted');
    }
}
