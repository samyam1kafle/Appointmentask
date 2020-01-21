<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests\dateValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Available_date;


class Available_DateController extends Controller
{

    protected $Available_date=null;

    public function __construct( Available_date $Available_date)
    {
        $this->Available_date=$Available_date;
    }

    public function index()
    {
        $all_Available_date = $this->Available_date->orderby('id','DESC')->get();
        return view('Admin.Available_Date.index')->with('Date', $all_Available_date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Available_Date.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(dateValidator $request)
    {

        $data=$request->all();
        $this->Available_date->fill($data);
        $success=$this->Available_date->save();
        return redirect()->route('AvailableDate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->Available_date=$this->Available_date->find($id);
        if(!$this->Available_date){
            request()->session()->flash('error','Available date list not found');
            return redirect()->route('AvailableDate.index');
        }
        return view('admin.Available_Date.update')->with('date',$this->Available_date);
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
        $this->Available_date=$this->Available_date->find($id);
        if(!$this->Available_date){
            request()->session()->flash('error','Date not found');
            return redirect()->route('AvailableDate.index');
        }
        $data=$request->all();
        $this->Available_date->fill($data);
        $success=$this->Available_date->save();
        return redirect()->route('AvailableDate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Available_date=$this->Available_date->find($id);
        if(!$this->Available_date){
            request()->session()->flash('error','Date list not found');
            return redirect()->route('AvailableDate.index');
        }
        $success=$this->Available_date->delete();
        if($success){
            request()->session()->flash('success','Date list deleted successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error deleting Date list');
        }
        return redirect()->route('AvailableDate.index');
    }
}
