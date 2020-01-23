<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Booking;
use App\Backend\All_User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id','desc')->get();
        return view('Admin/Booking/index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings = Booking::orderBy('id','desc')->get();
        return view('Admin/Booking/create',compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Booking::create($request->all());
        if($data){
            return redirect()->route('bookings.index')->with('success','New Booking has been created Successfully');
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
        $bookings = Booking::all();
        $book_id = Booking::findOrFail($id);
        $users = All_User::all();
        return view('Admin/Booking/edit', compact('bookings','book_id'));
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
        $update = Booking::find($id);
        $updated = $update->update($request->all());
       
        // Department::whereId($id)->update($updateData);
        if($updated){
            return redirect()->route('bookings.index')->with('success', 'Booking has been updated');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating bookings'); 
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
        $bookings = Booking::findOrFail($id);
        $bookings->delete();

        return redirect()->route('bookings.index')->with('completed', 'Selected Booking has been deleted');
    }
}
