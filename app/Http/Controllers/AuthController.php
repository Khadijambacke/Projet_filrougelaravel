<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Models;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;



use Symfony\Component\HttpFoundation\RedirectResponse;
//on impore hash pour les mot de passe
////use controller as c

class AuthController extends Controller
{
    public function ShowRegister(Request $request)
    {
        return view('Auth.register');
    }
    public function Showlogin(Request $request)
    {
        return view('auth.login');
    }
    ///validated methode permettra de faire des validation ,des controlles,
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users|confirmed',
            'password' => 'required|string|min:6',

        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('show.login')->with('success', 'Compte créé avec succès.');;
    }
    public function login(Request $request)
    {
       

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            // return redirect()->route('monpage');
            return redirect()->route('dashboard');
            ///return redirect()->intended('/dashboard');
            //on peut faire retour->back();
        }
        throw ValidationException::withMessages([
            'errors' => 'informations incorectttttttttt'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? 'Utilisateur Google',
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'password' => bcrypt(Str::random(32)),
            ]
        );

        Auth::login($user);
        return redirect()->intended('dashboard');

    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Erreur lors de la connexion avec Google.');
    }
}

    
}
