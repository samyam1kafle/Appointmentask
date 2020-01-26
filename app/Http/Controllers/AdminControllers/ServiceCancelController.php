<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Backend\service_cancel;
use App\Backend\service_detail;
use Illuminate\Http\Request;

class ServiceCancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serv_cancel=service_cancel::orderBy('id','desc')->get();
        return view('Admin/ServiceDetails/ServiceCancel/view',compact('serv_cancel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceBookedId=service_detail::all();
        return view('Admin/ServiceDetails/ServiceCancel/add',compact('serviceBookedId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCancelValidator $request)
    {
        $servCancel = new service_cancel([
            'Booked_id' => $request->Booked_id,
            'status' => 1
        ]);

        $servCancels = $servCancel->save();
        if ($servCancels) {
            return redirect()->route('service_cancel.index')->with('success', 'Service Cancel Successful');
        } else {
            return redirect()->back()->with('Error', 'There occurred some problem while adding the service cancel please try again after a while.');
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
        $servCancel = service_cancel::findOrFail($id);
        $serviceBookedId=service_detail::all();
        return view('Admin/ServiceDetails/ServiceCancel/edit', compact('servCancel','serviceBookedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCancelValidator $request, $id)
    {
        $servCancel = service_cancel::find($id);

        $servCancel->status = $request->status;
        $servCancel->Booked_id = $request->Booked_id;

        $update = $servCancel->save();

        if($update){
            return redirect()->route('service_cancel.index')->with('success', 'Service Cancel has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating service cancel');
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
        $servCancel = service_cancel::findOrFail($id);
        $servCancel->delete();

        return redirect()->route('service_cancel.index')->with('completed', 'Selected Service Cancel has been deleted');
    }
}
