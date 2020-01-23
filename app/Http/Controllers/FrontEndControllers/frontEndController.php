<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Backend\All_User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class frontEndController extends Controller
{
    public function index()
    {
        return view('frontEnd/index');
    }

    public function login_index(Request $request)
    {
        if ($request->isMethod('post')) {
//            $request->validate([
//                'password' => 'required',
//                'email' => 'required'
//
//            ]);
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

    public function register()
    {
        return view('frontEnd/register');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index')->with('success', 'Logged Out Successfully');
    }
}
