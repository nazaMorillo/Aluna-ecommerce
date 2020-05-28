<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['file','mimes:jpeg,jpg,png,gif','max:10000' ] //,'mimes:jpeg,jpg,png,gif','max:10000'
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
        if(empty(request()->file('avatar'))){
            $fileName = "user6_7714.png";
        }else{
            $ruta = request()->file('avatar')->store('public');
            $fileName = basename($ruta);
        }
        
        $user = User::create([
            'surname' => $data['surname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $fileName,
            'address' => $data['address'],

        ]);

        // $domain = explode('@', $data['email']);

        // $nameDomain = explode('.', $domain[1]);

        // if( $nameDomain[0] == 'allmarket') {

        //     $user->roles()->attach(Role::where('name', 'admin')->first());

        // }

        // else {
        
        $user->roles()->attach(Role::where('name', 'user')->first());

        // }


        return $user;

    }
}
