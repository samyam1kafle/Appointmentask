<?php

namespace App\Http\Controllers\AdminControllers;

use App\Backend\All_User;
use App\Backend\Roles;
use App\Mail\socialLoginMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;


class socialLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {

        $user = Socialite::driver($service)->stateless()->user();

        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;


        $name = $user->getName();
        $email = $user->getEmail();
        $mail_password = str_random();
        $password = hash::make($mail_password);


        $roles = Roles::where('name','=','subscriber')->first();


        if((All_User::where('email','=',$email)->first()!= null)){
            return redirect()->route('login')->with('delete','email already exists please login to continue');
        }else{
            $social_user = new All_User([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'role_id'=> $roles->id,
                'status'=>1,
            ]);

           $user = $social_user->save();

            if($user){
                Auth::login($social_user);

                Mail::to($email)->send(new socialLoginMail($name,$email,$mail_password));
                return redirect()->route('index')->with('success','You\'ve been successfully registered');
            }
        }


        // $user->token;
    }
}
