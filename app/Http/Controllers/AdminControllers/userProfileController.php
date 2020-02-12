<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\All_User;
use App\Backend\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userProfileController extends Controller
{
    public function auth_prof()
    {

        return view('Admin/Users/profile');

    }
}
