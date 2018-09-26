<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterActiveAccount;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => str_slug($data['name']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirm_token'=>str_random(100)
        ]);
    }

    protected function registered(Request $request, $user)
    {
        Mail::to($user)->send(new RegisterActiveAccount($user));
        Auth::logout();
        session()->flash('info', 'please check your email for active your account');
        return redirect('/');
    }


    public function confirm_registration()
    {
        $token = request('token');
        $user = User::where('confirm_token', $token)->first();
        if ($user) {
            $user->confirm();
            $this->guard()->login($user);
            session()->flash('success', 'your email has been activated');
            return redirect('/login');
        } else {
            session()->flash('error', 'this token is not valid');
            return redirect('/');
        }
    }
}
