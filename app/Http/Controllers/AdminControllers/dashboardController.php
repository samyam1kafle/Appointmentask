<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Roles;
use App\Backend\All_User;
use App\Backend\Todo;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    protected $Todo=null;
    protected $Roles=null;

    public function __construct(Todo $Todo,Roles $Roles)
    {
        $this->Todo=$Todo;
        $this->Roles=$Roles;
    }
    public function index(){
        $user=@Auth::user()->role_id;
        $this->Todo=$this->Todo->get();
        $this->Roles=$this->Roles->where('id',$user)->first();
        /*dd($this->Roles);*/
        $prov_id = Roles::where('name', '=', 'admin')->first();
        $subs_id = Roles::where('name', '=', 'subscriber')->first();
        $emp_id = Roles::where('name', '=', 'employee')->first();
        $providers = All_User::where('role_id', '=', $prov_id->id)->get()->count();
        $subscriber = All_User::where('role_id', '=', $subs_id->id)->get()->count();
        $employee = All_User::where('role_id', '=', $emp_id->id)->get()->count();
        return view('Admin/index')->with('todo', $this->Todo)
            ->with('providers',$providers)
            ->with('subscriber',$subscriber)
            ->with('employee',$employee)
            ->with('Roles',$this->Roles);

    }
}
