<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Degree;
use App\Http\Requests\DegreeValidator;

class DegreeController extends Controller
{
    protected $Degree=null;

    public function __construct(Degree $Degree)
    {
        $this->Degree=$Degree;
    }

    public function index()
    {
        $Degree=$this->Degree->get();
        return view('Admin.Degree.index')->with('Degree_data', $Degree);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Degree.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DegreeValidator $request)
    {
        $data=$request->all();
        $this->Degree->fill($data);
        $success=$this->Degree->save();
        if($success){
            request()->session()->flash('success','Degree list added successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error adding Degree list');
        }
        return redirect()->route('Degree.index');
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
        $Degree=$this->Degree->find($id);
        if (!$Degree){
            request()->session()->flash('error','Degree Not found');
            return redirect()->route('Degree.index');
        }
        return view('Admin.Degree.edit')->with('Degree_data',$Degree);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DegreeValidator $request, $id)
    {
        $this->Degree=$this->Degree->find($id);
        if(!$this->Degree){
            request()->session()->flash('error','Degree not found');
            return redirect()->route('Degree.index');
        }
        $data=$request->all();
        $this->Degree->fill($data);
        $success=$this->Degree->save();
        if($success){
            request()->session()->flash('success','Degree list updated successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error updating Degree list');
        }
        return redirect()->route('Degree.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Degree=$this->Degree->find($id);
        if(!$Degree) {
            request()->session()->flash('error', 'Date not found');
            return redirect()->route('Degree.index');
        }
        $success=$Degree->delete();
        if($success){
            request()->session()->flash('success','Degree list deleted successfully');

        }
        else{
            request()->session()->flash('error','sorry there was an error deleting Degree list');
        }
        return redirect()->route('Degree.index');
    }
}
