<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Backend\All_User;
use App\Backend\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class frontEndController extends Controller
{
    public function index()
    {
        return view('frontEnd/index');
    }

    public function login_index(Request $request)
    {
        if ($request->isMethod('post')) {
           $this->validate($request,[
               'password' => 'required',
               'email' => 'required'
           ]);
            $password = $request->password;
            $email = $request->email;
            $remember = $request->remember;
//            dd($remember);
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
//                if (Auth::user()->role == 41){
//                    return redirect()->route('admin')->with('success', 'Login Successful Welcome to the admin pannel');
//                }else{
//                    return redirect()->route('home-index')->with('success', 'Login Successful');
//                }
                return redirect()->route('admin-dashboard')->with('success', 'Login Successful Welcome to the admin panel');

            } else {
                return redirect()->back()->with('Error', 'Records Not found');
            }


        } elseif ($request->isMethod('get')) {
            return view('frontEnd/login');
        } else {
            return redirect()->route('register')->with('Error', "No Records Found ")->with("New User ? SignUp");
        }

    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('frontEnd/register');
        }
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'image' => 'required',
                'gender' => 'required',
                'password' => 'confirmed | min:5 | max:15 ',
                'email' => 'required',
                'name' => 'required | min:3 | max:15'
            ]);

            $roles = Roles::where('name', '=', 'subscriber')->first();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . $image->getClientOriginalExtension();
                $resize = Image::make($image);
                $resize->resize('600', '600')->save('Uploads/users/thumbnails/' . $name);
            }
            $user = new All_User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id ? $request->role_id : '',
                'gender' => $request->gender,
                'department_id' => $request->department_id,
                'image' => $name,
                'status' => 1,
                'role_id' => $roles->id,
            ]);
            $users = $user->save();
            if ($users) {
                if (Auth::check()) {
                    return redirect()->route('index')->with('success', 'You have registered to our site successfully');
                } else {
                    Auth::login($user, $request->remember);
                    return redirect()->route('index')->with('success', 'You have been registered successfully');
                }


            } else {
                return redirect()->back()->with('Error', 'There occurred some problem while registering please try again after a while.');
            }

        }


    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index')->with('success', 'Logged Out Successfully');
    }
}
