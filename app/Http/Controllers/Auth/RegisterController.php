<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserReferred;
use App\Profile;
use App\Reflink;
use App\Http\Controllers\Controller;
use App\Settings;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
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
    protected $redirectTo = '/verify/logout';

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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
            
          

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

        $settings = Settings::first();

        $user = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'admin'=>0,
            'active'=>0,
            'membership_id'=>1,
            'membership_started'=>date('Y-m-d'),
            'membership_expired'=>'2040-12-31',
            'token'=>str_random(25),
            'account'=>mt_rand(100000000, 999999999),
            'bonus' => Carbon::now(),

        ]);

        Profile::create([

            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/default.jpg',
            'main_balance'=>$settings->signup_bonus,
            'savings_balance'=> 0,
            'address' => $data['address'],
            'country' => $data['country'],
            'mobile' => $data['mobile'],
            'state' => $data['state'],
            'postcode' => $data['zip'],
        ]);

        Reflink::create([

            'user_id'=> $user->id,
            'link'=> $data['username'],

        ]);

        $user->sendVerificationEmail();

        event(new UserReferred(request()->cookie('ref'), $user));

        session()->flash('message', 'Dear user your account has been create successfully. Please check your email for activate your account.');
        Session::flash('type', 'warning');
        Session::flash('title', 'Email Verification Required');


        return $user;
    }
}
