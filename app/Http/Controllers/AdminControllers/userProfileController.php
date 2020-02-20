<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\All_User;
use App\Backend\Degree;
use App\Backend\Roles;
use App\Http\Requests\updatePwd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Backend\User_education_detail;
use App\Backend\User_work_detail;
use App\Backend\User_personal_detail;

class userProfileController extends Controller
{
    public function auth_prof()
    {
        $prov_id = Roles::where('name', '=', 'admin')->first();
        $subs_id = Roles::where('name', '=', 'subscriber')->first();
        $emp_id = Roles::where('name', '=', 'employee')->first();
        $providers = All_User::where('role_id', '=', $prov_id->id)->get()->count();
        $subscriber = All_User::where('role_id', '=', $subs_id->id)->get()->count();
        $employee = All_User::where('role_id', '=', $emp_id->id)->get()->count();
        $educ =  User_education_detail::where('user_id','=',Auth::user()->id)->first();
        $wrk =  User_work_detail::where('user_id','=',Auth::user()->id)->first();
        $prsnl =  User_personal_detail::where('user_id','=',Auth::user()->id)->first();
        // $degree = Degree::a();
        return view('Admin/Users/profile', compact('providers', 'subscriber', 'employee','educ','wrk','prsnl'));
    }

    public function prof_update(Request $request)
    {
        if ($request->isMethod('get')) {
            $degree = Degree::all();
            $educ =  User_education_detail::where('user_id','=',Auth::user()->id)->first();
            $wrk =  User_work_detail::where('user_id','=',Auth::user()->id)->first();
            $prsnl =  User_personal_detail::where('user_id','=',Auth::user()->id)->first();
            // dd($educ);
            return view('Admin/Users/updateProf', compact('degree','educ','wrk','prsnl'));
        }
    }

    public function update_user(updatePwd $request, $id)
    {
        $user = All_User::findOrFail($id);
        $old_password = $user->password;
        $current = $request->old_password;
        $new_pwd = $request->password;
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/users/thumbnails/' . $user->image);
            }
            $new_img = $request->file('image');
            $name = time() . $new_img->getClientOriginalExtension();
            $resize = Image::make($new_img);
            $resize->resize('600','600')->save('Uploads/users/thumbnails/' .$name);
            $user->image = $name;
        }else{
            $user->image = Auth::user()->image;
        }
        if (Hash::check($current, $old_password)) {
            $user->password = Hash::make($new_pwd);
            $user->update();

            return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
            return redirect()->back()->with('Error', 'Current Password Incorrect please try again');
        }
    }
}
