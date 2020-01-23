<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests\timeValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Available_time;
use App\Backend\Available_date;

class Available_TimeController extends Controller
{
    protected $Available_time=null;
    protected $Available_date=null;

    public function __construct( Available_time $Available_time, Available_date $Available_date)
    {
        $this->Available_time=$Available_time;
        $this->Available_date=$Available_date;
    }
    public function index()
    {
        $this->Available_time=$this->Available_time->GetDate();
        return view('Admin.Available_Time.index')->with('time',$this->Available_time);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Available_date=$this->Available_date->orderby('id', 'ASC')->get();
        return view('Admin.Available_Time.Create')->with('date',$this->Available_date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(timeValidator $request)
    {
        $data=$request->all();
        $this->Available_time->fill($data);
        $success=$this->Available_time->save();
        if($success){
            request()->session()->flash('success','Date list added successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error adding Date list');
        }
        return redirect()->route('AvailableTime.index');
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
        $this->Available_time=$this->Available_time->find($id);
        $this->Available_date=$this->Available_date->orderby('id', 'ASC')->get();
        if(!$this->Available_time){
            request()->session()->flash('error','Available time list not found');
            return redirect()->route('AvailableTime.index');
        }
        return view('admin.Available_Time.update')->with('time',$this->Available_time)->with('date',$this->Available_date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(timeValidator $request, $id)
    {
        $this->Available_time=$this->Available_time->find($id);
        $data=$request->all();
        $this->Available_time->fill($data);
        $success=$this->Available_time->save();
        if($success){
            request()->session()->flash('success','Time list updateed successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error updateing Time list');
        }
        return redirect()->route('AvailableTime.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Available_time=$this->Available_time->find($id);
        if(!$this->Available_time){
            request()->session()->flash('error','Time list not found');
            return redirect()->route('AvailableTime.index');
        }
        $success=$this->Available_time->delete();
        if($success){
            request()->session()->flash('success','Time list deleted successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error deleting Time list');
        }
        return redirect()->route('AvailableTime.index');
    }
}
