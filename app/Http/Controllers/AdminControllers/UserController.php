<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\All_User;
use App\Backend\Department;
use App\Backend\Roles;
use App\Http\Requests\userUpdate;
use App\Http\Requests\UserValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = All_User::orderBy('id', 'desc')->get();
        return view('Admin/Users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        $depart = Department::all();
        return view('Admin/Users/create', compact('roles', 'depart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidator $request)
    {
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
            'status' => 1
        ]);
        $users = $user->save();
        if ($users) {
            return redirect()->route('user.index')->with('success', 'User registered successfully');
        } else {
            return redirect()->back()->with('Error', 'There occurred some problem while adding the user please try again after a while.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = All_User::findOrFail($id);
        $roles = Roles::all();
        $depart = Department::all();
        return view('Admin/Users/edit', compact('user', 'roles', 'depart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(userUpdate $request, $id)
    {
        $user = All_User::find($id);

        if ($request->hasFile('image')) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/users/thumbnails/' . $user->image);
            }
            $featured = $request->file('image');
            $name = time(). $featured->getClientOriginalExtension();

            $resize = Image::make($featured);
            $resize->resize('600','600')->save('Uploads/users/thumbnails/' .$name);

            $user->image = $name;
        }else{
            $user->image = $user->image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->gender = $request->gender;
        $user->department_id = $request->department_id;
        $update = $user->save();
        if($update){
            return redirect()->route('user.index')->with('success','User details updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = All_User::findOrFail($id);
        if ($user != null) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/users/thumbnails/' . $user->image);
            }
            $destroy = $user->delete();
            if ($destroy) {
                return redirect()->route('user.index')->with('success', 'User deleted successfully');
            }
        } else {
            return redirect()->route('user.index')->with('Error', 'There was an error while deleting the user please try after a while');
        }
    }
}
