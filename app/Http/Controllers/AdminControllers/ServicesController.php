<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Service;
use App\Backend\All_User;
use App\Backend\Roles;
use App\Backend\Department;
use App\Http\Requests\ServicesValidator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();

        $role = Roles::where('name','=','subscriber')->first();
        $guest = Roles::where('name','=','guest')->first();
        $users = All_User::where('role_id','=',$role->id)->get();
        $guests = All_User::where('role_id','=',$guest->id)->get();
        $users = [$users ,$guests];

        $department = Department::orderBy('id','desc')->get();
        
        return view('Admin/Services/index',compact('services','users','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Roles::where('name','=','subscriber')->first();
        $guest = Roles::where('name','=','guest')->first();
        $users = All_User::where('role_id','=',$role->id)->get();
        $guests = All_User::where('role_id','=',$guest->id)->get();
        $users = [$users ,$guests];
        $department = Department::orderBy('id','desc')->get();
 
        return view('Admin/Services/create',compact('users','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesValidator $request)
    {
        $data = Service::create($request->all());
        if($data){
            return redirect()->route('services.index')->with('success','Service has been created Successfully');
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
        $services = Service::all();
        $service_id = Service::findOrFail($id);

        $role = Roles::where('name','=','subscriber')->first();
        $guest = Roles::where('name','=','guest')->first();
        $users = All_User::where('role_id','=',$role->id)->get();
        $guests = All_User::where('role_id','=',$guest->id)->get();
        $users = [$users ,$guests];
        $department = Department::orderBy('id','desc')->get();

        return view('Admin/Services/edit', compact('services','service_id','users','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesValidator $request, $id)
    {
        $serv = Service::find($id);

        $serv->name = $request->name;
        $serv->User_id = $request->User_id;
        $serv->Department_id = $request->Department_id;
        $serv->Service_description = $request->Service_description;
        
        $update = $serv->save();

        if($update){
            return redirect()->route('services.index')->with('success', 'Services has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating Services'); 
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
        $services = Service::findOrFail($id);
        $services->delete();

        return redirect()->route('services.index')->with('completed', 'Selected Service has been deleted');
    }
}
