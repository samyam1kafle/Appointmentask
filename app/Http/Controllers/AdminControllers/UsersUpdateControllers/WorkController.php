<?php

namespace App\Http\Controllers\AdminControllers\UsersUpdateControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\User_work_detail;
use Intervention\Image\ImageManagerStatic as Image;

class WorkController extends Controller
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
        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $name = time() .'.'. $image->getClientOriginalExtension();
            $resize = Image::make($image);
            $resize->resize('600', '600')->save('Uploads/work_document' . $name);
        }
        $wrk = new User_work_detail([
            'user_id' => $request->user_id,
            'profession' => $request->profession,
            'work_exp' => $request->work_exp,
            'org_name' => $request->org_name,
            'org_address' => $request->org_address,
            'document' => $name,
            'org_pan' => $request->org_pan,
            'phone_1'=> $request->phone_1,
            'phone_2'=> $request->phone_2,
            'fee' => $request->fee
       ]);
       $data = $wrk->save();
        
        if($data){
            return redirect()->back()->with('delete','Work Details added successfully !!!');
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
        $wrk = User_work_details::findOrFail($id);
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
         $wrk = User_work_detail::find($id);
         if ($request->hasFile('document')) {
            if ($wrk->document != null) {
                unlink(public_path() . '/Uploads/work_document' . $user->document);
            }
            $featured = $request->file('document');
            $name = time().'.'. $featured->getClientOriginalExtension();

            $resize = Image::make($featured);
            $resize->resize('600','600')->save('Uploads/users/thumbnails/' .$name);

            $wrk->document = $name;
        }else{
            $wrk->document = $wrk->document;
        }
             $wrk->user_id = $request->user_id;
             $wrk->profession = $request->profession;
             $wrk->work_exp = $request->work_exp;
             $wrk->org_name = $request->org_name;
             $wrk->org_address = $request->org_address;
             $wrk->org_pan = $request->org_pan;
             $wrk->phone_1 = $request->phone_1;
             $wrk->phone_2 = $request->phone_2;
             $update = $wrk->save();
             if($update){
                 return redirect()->back()->with('success','User Work details updated successfully');
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
