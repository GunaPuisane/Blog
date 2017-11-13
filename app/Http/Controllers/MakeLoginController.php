<?php

namespace homePage\Http\Controllers;
use Illuminate\Http\Request;
use homePage\User;
use homePage\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MakeLoginController extends Controller
{

    public function logincheck(Request $request)
    {
        $password = $request->input('password');
        $username = $request->input('username');
       //is username and password valid
        if (Auth::attempt(['username' => $username, 'password' => $password]) )
        {
            $user = Auth::user();
            $request->session()->put('username',$user);
            return Redirect::to('/');
        }   
        else 
        {
            // authentication fail, back to login page with errors
             return view('login')->withErrors('Error');
        }
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect('/login');
    }

}


