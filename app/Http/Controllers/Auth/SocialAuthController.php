<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($social)
    {

        if(! request()->has('code') || request()->has('denied')) {
            session()->flash('message', ['danger', __("Inicio de sesión cancelado")]);
            return redirect('login');
        }

        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($social)->user(); 

        //dd($social_user);

       // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.

            // if($social_user->email == null) {

            //     $user = User::create([
            //         'surname' => $social_user->nickname,
            //         'name' => $social_user->name,
            //         'email' => 'usuario'.$social_user->id.'@completar.com',
            //         'avatar' => $social_user->avatar,
            //     ]);

            // } else {

            $user = User::create([
                'surname' => $social_user->nickname,
                'name' => $social_user->name,
                'email' => $social_user->email,
                'avatar' => $social_user->avatar,
            ]);

            // }
 
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
 
        return redirect()->to('/home#');
    }
}
