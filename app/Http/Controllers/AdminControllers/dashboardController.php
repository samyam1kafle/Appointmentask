<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backend\Todo;

class dashboardController extends Controller
{
    protected $Todo=null;

    public function __construct(Todo $Todo)
    {
        $this->Todo=$Todo;
    }
    public function index(){
        $this->Todo=$this->Todo->get();
        return view('Admin/index')->with('todo', $this->Todo);
    }
}
