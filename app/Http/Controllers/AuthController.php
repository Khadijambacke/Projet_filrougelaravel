<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Http\Models;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;
//on impore hash pour les mot de passe
////use controller as c

class AuthController extends Controller
{
    public function ShowRegister(Request $request){
        return view('Auth.register');
        
    }
    public function Showlogin(Request $request){
        return view('auth.login');
    }
    ///validated methode permettra de faire des validation ,des controlles,
    public function register(Request $request){
        $validated = $request->validate([
            'name'=> 'required|string|max:100',
            'email'=> 'required|email|unique:users|confirmed',
            'password'=> 'required|string|min:6',
             
        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('show.login');
       
    }
    public function login(Request $request){
        $validated = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string',
        ]);
        if(Auth::attempt($validated)){
            
            $request->session()->regenerate();
            // return redirect()->route('monpage');
            return redirect()->route('dashboard');
            ///return redirect()->intended('/dashboard');
            //on peut faire retour->back();
        }
        throw ValidationException::withMessages([
            'errors'=> 'informations incorectttttttttt'
        ]);
     
    }
    
}
