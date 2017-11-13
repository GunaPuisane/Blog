<?php

namespace homePage\Http\Controllers\Auth;
use homePage\Http\Requests;
use homePage\User;
use homePage\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use ReflectionClass;

class RegisterController extends Controller
{
    use RegistersUsers;
 
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255'
        ]);
        if ($validator->fails())
        {
                return Redirect::to('register')
                        ->withErrors($validator->messages());
        }
        else
        {
                Register::saveFormData(Input::except(array('_token','cpassword')));

                return Redirect::to('register')
                        ->withMessage('Data inserted');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \homePage\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            
        ]);
    }

}