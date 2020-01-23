<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\Roles;
use App\Http\Requests\RolesValidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::orderBy('id', 'desc')->get();
        return view('Admin/Roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Roles/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesValidate $request)
    {
        $create = $request->all();
        $roles = Roles::create($create);
        if($roles){
            return redirect()->back()->with('success','Role Created Successfully');
        }
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
        $role = Roles::findOrFail($id);
        return view('Admin/Roles/edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesValidate $request, $id)
    {
        $role = Roles::find($id);
        $update = $role->update($request->all());
        if(!$update){
            return redirect()->back()->with('error','Sorry the changes couldn\'t be made');
        }else{
            return redirect()->back()->with('success','Role updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Roles::findOrFail($id);
        if($delete == null){
            return redirect()->back()->with('Error','The Role you are looking for is not available');
        }else{
            $deleted = $delete->delete();
            if($deleted){
                return redirect()->back()->with('success','The Role Deleted Successfully');
            }
        }
    }
}
