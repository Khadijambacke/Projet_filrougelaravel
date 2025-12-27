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




class AuthController extends Controller
{
    public function ShowRegister(Request $request){
        return view('Auth.register');
        
    }
    public function Showlogin(Request $request){
        return view('Auth.login');
    }

    //
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
            return redirect()->route('monpage');
            return redirect()->route('dashboard');
            ///return redirect()->intended('/dashboard');
        }
        throw ValidationException::withMessages([
            'errors'=> 'informations incorectttttttttt'
        ]);
     
    }
    
}
