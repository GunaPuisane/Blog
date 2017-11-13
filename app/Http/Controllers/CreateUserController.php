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

class CreateUserController extends Controller
{

    public function store(Request $request)
    {
                $data =  Input::except(array('_token'));
                $rule  =  array(
                    'username' => 'required|string|unique:users',
                    'password' => 'required|string|confirmed',
                    'password_confirmation' => 'required',
                    'first_name'=> 'required|string',
                    'last_name'=> 'required|string'
                    );
     
                $validator = Validator::make($data,$rule);
     
                if ($validator->fails())
                {
                        return Redirect::to('register')
                                ->withErrors($validator->messages());
                }
                else
                {
                    
        User::create([
            'username' => request('username'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'password' => bcrypt(request('password')),
        ]);
                    return Redirect::to('login');
                }
    }


}
