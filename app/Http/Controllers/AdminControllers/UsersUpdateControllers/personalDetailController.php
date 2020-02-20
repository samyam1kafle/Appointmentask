<?php

namespace App\Http\Controllers\AdminControllers\UsersUpdateControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\User_personal_detail;

class personalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prsnl = new User_personal_detail([            
            'user_id' => $request->user_id,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'date_of_birth' => $request->date_of_birth            
       ]);
       $data = $prsnl->save();
        
        if($data){
            return redirect()->back()->with('delete','Personal Details added successfully !!!');
        }else {
            return redirect()->back()->with('Error', 'There occurred some problem , please try again after a while.');
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
        $prsnl = User_personal_details::findOrFail($id);
        return redirect()->back();
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
        $prsnl = User_personal_detail::find($id);
        $prsnl->user_id = $request->user_id;
        $prsnl->address1 = $request->address1;
        $prsnl->address2 = $request->address2;
        $prsnl->phone1 = $request->phone1;
        $prsnl->phone2 = $request->phone2;
        $prsnl->date_of_birth = $request->date_of_birth;
        $update = $prsnl->save();
        if($update){
            return redirect()->back()->with('success','User Personal details updated successfully');
        }else{
           return redirect()->back()->with('error','Errors Occurred !!!');
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
        //
    }
}
