<?php

namespace App\Http\Controllers\AdminControllers\UsersUpdateControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\User_education_detail;
use App\Backend\Degree;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $education = User_education_detail::orderBy('id','desc')->get();
        // return view('Admin.Users.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $degree = Degree::all();
        // $education = User_education_detail::orderBy('id','desc')->get();
        // return view('Admin/Users/updateProf',compact('$degree','education'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $edu = new User_education_detail([
            'user_id' => $request->user_id,
            'inst_name' => $request->inst_name,
            'inst_address' => $request->inst_address,
            'degree_id' => $request->degree_id,
            'faculty' => $request->faculty,
            'board' => $request->board,
            'passed_year' => $request->passed_year,
            'passed_division'=> $request->passed_division
       ]);
       $data = $edu->save();
        // $data = User_education_detail::create($request->all());
        if($data){
            return redirect()->back()->with('delete','Education Details added successfully !!!');
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
        $educ = User_education_details::findOrFail($id);
        return view('Admin/Users/updateProf');
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
        $educ = User_education_detail::find($id);

             $educ->user_id = $request->user_id;
             $educ->inst_name = $request->inst_name;
             $educ->inst_address = $request->inst_address;
             $educ->degree_id = $request->degree_id;
             $educ->faculty = $request->faculty;
             $educ->board = $request->board;
             $educ->passed_year = $request->passed_year;
             $educ->passed_division = $request->passed_division;
             $update = $educ->save();
             if($update){
                 return redirect()->back()->with('success','User education details updated successfully');
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
