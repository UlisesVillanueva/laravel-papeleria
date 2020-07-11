<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class SocialLoginController extends Controller
{
    //funcion para redireccionar a autenticacion con FB
    public function redirectToNetwork($socialnetwork)
    {
    	return Socialite::driver($socialnetwork)->redirect();
    }

    public function handleCallback($socialnetwork){

    
    	$socialUser=Socialite::driver($socialnetwork)->user();
    	//dd($socialUser);
    		

    	//Agregar campos faltantes en la tabla users
    	//Verificar si el identificador de la red social  esta registrado
    	$socialProfile=User::firstOrNew(['social_network'=>$socialnetwork,
    		 'social_id'=>$socialUser->getId()
    		]);
    	//Verificamos que el correo electronico de la red social no esta registrado
    		$user=User::firstOrNew(['email'=>$socialUser->getEmail()]);
    		// si el social id no existe
    	if(!$socialProfile->exists){
    	// si el correo no existe  		
    		if(!$user->exists){
    			// si no existe obtenemos el usuario y correo
    			$user->name=$socialUser->getName();
    			$user->email=$socialUser->getEmail();
    		}
    		//guardamos el avatar, id y nombre de la red social
    		$user->avatar=$socialUser->getAvatar();
    		$user->social_id=$socialUser->getId();
    		$user->social_network=$socialnetwork;
    		$user->perfil_id=1;
    		$user->save();
    	}

    	Auth::login($user);
    	return redirect()->route('home');
    }
}
