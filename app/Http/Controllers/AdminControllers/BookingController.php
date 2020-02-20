<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Booking;
use App\Backend\Roles;
use App\Backend\Service;
use App\Backend\All_User;
use App\Backend\Todo;
use App\Http\Requests\BookingValidator;

class BookingController extends Controller
{
    protected $Todo=null;

    public function __construct(Todo $Todo)
    {
        $this->Todo=$Todo;
    }
    public function index()
    {
        $this->Todo=$this->Todo->get();
        $bookings = Booking::orderBy('id','desc')->get();
        return view('Admin/Booking/index',compact('bookings'))->with('todo', $this->Todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Todo=$this->Todo->get();
        $role = Roles::where('name','=','subscriber')->first();
        $guest = Roles::where('name','=','guest')->first();
        $users = All_User::where('role_id','=',$role->id)->get();
        $guests = All_User::where('role_id','=',$guest->id)->get();
        $users = [$users ,$guests];

        $services = Service::orderBy('id','desc')->get();

        return view('Admin/Booking/create',compact('users','services','role'))->with('todo', $this->Todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingValidator $request)
    {
        $this->Todo=$this->Todo->get();
        $data = Booking::create($request->all());
        if($data){
            return redirect()->route('bookings.index')->with('todo', $this->Todo)->with('success','New Booking has been created Successfully');
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
        $this->Todo=$this->Todo->get();
        $bookings = Booking::all();
        $book_id = Booking::findOrFail($id);
        $users = All_User::all();
        return view('Admin/Booking/edit', compact('bookings','book_id','users'))->with('todo', $this->Todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingValidator $request, $id)
    {
        $this->Todo=$this->Todo->get();
        $book = Booking::find($id);

        $book->name = $request->name;
        $book->User_id = $request->User_id;
        $book->service_id = $request->service_id;
        $book->booking_date = $request->booking_date;
        $book->booking_time = $request->booking_time;
        $book->status = $request->status;

        $update = $book->save();
        
        if($update){
            return redirect()->route('bookings.index')->with('success', 'Booking has been updated')->with('todo', $this->Todo);
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating bookings')->with('todo', $this->Todo);
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
        $this->Todo=$this->Todo->get();
        $bookings = Booking::findOrFail($id);
        $bookings->delete();

        return redirect()->route('bookings.index')->with('completed', 'Selected Booking has been deleted')->with('todo', $this->Todo);
    }
}
