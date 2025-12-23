<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
{
   
    public function index()
    { 
        $user = auth::user(); 
        $useer = $user->useer;

        if (!$user) {
            return redirect()->route('Auth.login'); 
        }

        if ($user->role === 'admin') { 
            return view('dashboard.admin'); 
                } if ($user->role === 'medecin') { 
                    return view('dashboard.medecin'); 
                 } 
        return view('dashboard.patient'); 
    }
}

