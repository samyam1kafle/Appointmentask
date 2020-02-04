<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\service_booked;
use App\Backend\service_complete;
use App\Backend\service_reschedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCompleteValidator;
use Illuminate\Http\Request;

class ServiceCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceComplete = service_complete::orderBy('id','desc')->get();
        return view('Admin/ServiceDetails/ServiceComplete/view',compact('serviceComplete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceBooked = service_booked::orderBy('id','desc')->get();
        $serviceReschedule = service_reschedule::orderBy('id','desc')->get();
        return view('Admin/ServiceDetails/ServiceComplete/add',compact('serviceBooked','serviceReschedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCompleteValidator $request)
    {
        $servComplete = new service_complete([
            'service_booked_id' => $request->service_booked_id,
            'service_reschedule_id' => $request->service_reschedule_id,
            'status' => 1,
            'complete_date' => $request->complete_date,
            'complete_time' => $request->complete_time
        ]);
        $data = $servComplete->save();
        if($data){
            return redirect()->route('service_complete.index')->with('success','New Service Complete has been created Successfully');
        }
        else {
            return redirect()->back()->with('Error', 'There occurred some problem while adding Service Complete please try again after a while.');
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
        $serviceComplete = service_complete::all();
        $serviceCompleteId = service_complete::findorFail($id);
        $serviceBooked = service_booked::all();
        $serviceReschedule = service_reschedule::all();
        return view('Admin/ServiceDetails/ServiceComplete/edit', compact('serviceComplete','serviceCompleteId','serviceBooked','serviceReschedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCompleteValidator $request, $id)
    {
        $sComplete = service_complete::find($id);

        $sComplete->service_booked_id = $request->service_booked_id;
        $sComplete->service_reschedule_id = $request->service_reschedule_id;
        $sComplete->status = $request->status;
        $sComplete->complete_date = $request->complete_date;
        $sComplete->complete_time = $request->complete_time;

        $update = $sComplete->save();

        if($update){
            return redirect()->route('service_complete.index')->with('success', 'Service Complete has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating service complete');
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
        $service_complete = service_complete::findOrFail($id);
        $service_complete->delete();

        return redirect()->route('service_complete.index')->with('completed', 'Selected Booking has been deleted');
    }
}
