<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Backend\date_time;

class Date_TimeController extends Controller
{

    protected $date_time=null;

    public function __construct(date_time $date_time)
    {

        $this->date_time=$date_time;
    }
    public function index()
    {
        $this->date_time=$this->date_time->orderby('id', 'ASC')->Get();
       return view('Admin.Date_Time.Index')->with('Dt',$this->date_time);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Date_Time.create');
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
        $this->date_time->fill($data);
        $success=$this->date_time->save();
        $success=$this->date_time->save();
        if($success){
            request()->session()->flash('success','Date list added successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error adding Date list');
        }
        return redirect()->route('Date_Time.index');
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
        $this->date_time=$this->date_time->orderby('id', 'ASC')->first();
        if(!$this->date_time){
            request()->session()->flash('error','Available date and time list not found');
            return redirect()->route('Date_Time.index');
        }
        return view('admin.Date_Time.update')->with('date_time',$this->date_time);
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
        $this->date_time=$this->date_time->orderby('id', 'ASC')->first();
        $data=$request->all();
        $this->date_time->fill($data);
        $success=$this->date_time->save();
        $success=$this->date_time->save();
        if($success){
            request()->session()->flash('success','Date list updateed successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error updateing Date list');
        }
        return redirect()->route('Date_Time.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->date_time = $this->date_time->orderby('id', 'ASC')->first();
        if (!$this->date_time) {
            request()->session()->flash('error', 'Date and Time list not found');
            return redirect()->route('Date_Time.index');
        }
        $success = $this->date_time->delete();
        if ($success) {
            request()->session()->flash('success', 'Date and Time list deleted successfully');

        } else {
            request()->session()->flash('error', 'sorry there was an error deleting Date and Time list');
        }
        return redirect()->route('Date_Time.index');
    }

}
