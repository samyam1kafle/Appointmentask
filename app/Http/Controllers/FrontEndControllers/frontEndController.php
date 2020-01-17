<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontEndController extends Controller
{
    public function index(){
        return view('frontEnd/index');
    }
}
