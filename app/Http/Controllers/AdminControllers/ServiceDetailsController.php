<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Backend\service_detail;
use App\Backend\Roles;
use App\Backend\All_User;
use App\Backend\booking;
use App\Backend\service_booked;
use App\Backend\service_cancel;
use App\Backend\service_complete;
use App\Backend\service_reschedule;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceDetailsValidator;

class ServiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_details=service_detail::orderBy('id','desc')->get();
        return view('Admin/ServiceDetails/AllDetails/view',compact('service_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscriber = Roles::where('name','=','subscriber')->first();
        $guest = Roles::where('name','=','guest')->first();
        $admin = Roles::where('name','=','admin')->first();
        $subscriberId=All_User::where('role_id','=',$subscriber->id)->get();
        $guestId=All_User::where('role_id','=',$guest->id)->get();
        $adminId=All_User::where('role_id','=',$admin->id)->get();
        $user = [$subscriberId,$guestId,$adminId];

        $bookingId=booking::orderBy('id','desc')->get();
        $servBookedId=service_booked::all();
        $servCancelId=service_cancel::all();
        $servCompleteId=service_complete::all();
        $servRescheduleId=service_reschedule::all();
        return view('Admin/ServiceDetails/AllDetails/add',compact('user','userId','bookingId','servBookedId','servCancelId','servCompleteId','servRescheduleId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceDetailsValidator $request)
    {
        $servDetails->User_id = $request->users;
        $servDetails->booked_id = $request->booked_id;
        $servDetails->cancel_id = $request->cancel_id;
        $servDetails->reschedule_id = $request->reschedule_id;
        $servDetails->complete_id = $request->complete_id;
        $servDetails->booking_id = $request->booking_id;
        $add = $servDetails->save();
        if($add){
            return redirect()->route('service_details.index')->with('success','New Service Details has been created Successfully');
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
        $service_details = service_details::all();
        $service_details_id = service_details::findorFail($id);
        return view('Admin/ServiceDetails/AllDetails/edit', compact('service_details','service_details_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceDetailsValidator $request, $id)
    {
        $servDetails = service_details::find($id);

        $servDetails->User_id = $request->User_id;
        $servDetails->booked_id = $request->booked_id;
        $servDetails->cancel_id = $request->cancel_id;
        $servDetails->reschedule_id = $request->reschedule_id;
        $servDetails->complete_id = $request->complete_id;
        $servDetails->booking_id = $request->booking_id;

        $update = $servDetails->save();

        if($update){
            return redirect()->route('service_details.index')->with('success', 'Service Details has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating service details');
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
        $service_details = service_details::findOrFail($id);
        $service_details->delete();

        return redirect()->route('service_details.index')->with('completed', 'Selected Service Details has been deleted');
    }
}
