<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Backend\All_User;
use App\Backend\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Backend\Todo;
use Intervention\Image\ImageManagerStatic as Image;


class frontEndController extends Controller
{

    use RegistersUsers;
    protected $Todo = null;

    public function __construct(Todo $Todo)
    {
        $this->Todo = $Todo;
    }

    public function index()
    {
//        $user = Auth::check() ? Auth::user() : [];
//        if($user->email_verified_at != null){
//            Mail::to($user->email)->send(new socialLoginMail($user->name,$user->email,$user->mail_password));
//        }
        $this->Todo = $this->Todo->get();
        return view('frontEnd/index')->with('todo', $this->Todo);
    }

    public function login_index(Request $request)
    {
        $this->Todo = $this->Todo->get();
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'required',
                'email' => 'required'
            ]);
            $password = $request->password;
            $email = $request->email;
            $remember = $request->remember;
//            dd($remember);
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
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
        $this->Todo = $this->Todo->get();

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
            if ($roles == []) {
                return redirect()->back()->with('Error', 'There occurred some problem in the system please try again in a while');
            }
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
                'role_id' => $roles->id ? $roles->id : '',
            ]);

            $users = $user->save();
            if ($users) {
                if ($user->email_verified_at == null) {
                    $user->sendEmailVerificationNotification();
                    Auth::login($user);
                    return view('auth.verify');
                } else {
                    if (Auth::check()) {
                        return redirect()->route('index')->with('todo', $this->Todo)->with('success', 'You have registered to our site successfully');
                    } else {
                        Auth::login($user);
                        return redirect()->route('index')->with('todo', $this->Todo)->with('success', 'You have been registered successfully');
                    }
                }


            } else {
                return redirect()->back()->with('Error', 'There occurred some problem while registering please try again after a while.');
            }

        }


    }


    public function logout()
    {
        $this->Todo = $this->Todo->get();
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('todo', $this->Todo)->with('success', 'Logged Out Successfully');
    }

    public function markasread()
    {
        $user = All_User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
