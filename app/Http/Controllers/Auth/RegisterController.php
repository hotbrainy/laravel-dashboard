<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserRegistered;
use App\Profile;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_admin' => false,
            'password' => bcrypt($data['password']),
            //generates random string 20 characters long
            'verification_code' => base64_encode($data['email']),
            'settings' => ''
        ]);

        if (!$user->is_admin){
            if(config('app.env') === 'production'){
                $user->notify(new UserRegistered($user));
            }

            $profile = new Profile(); // fill the empty profile
            $profile->user_id = $user->id;
            $profile->avatar = config('app.defaultPplaceholder');

            $profile->save();
        }else{
            $profile = new Profile(); // fill the empty profile
            $profile->user_id = $user->id;
            $profile->avatar = config('app.defaultPplaceholder');
            $profile->save();
        }


        return $user;
    }
}
