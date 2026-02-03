<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\Auth\LoginRequest;


class DashboardController extends Controller
{
    ///sur les routes parfois on utiise request
   
    public function index()
    { 
        $user = Auth::user(); 
        ///check
        //dd($user):permet de voir l'errur comme cho
        if (!$user) {
            return redirect()->route('show.register'); 
        }
        if ($user->role === 'medecin') { 
            return view('dashboard.dashboardMedecin'); 
                } if ($user->role === 'admin') { 
                    return view('dashboard.dashboardAdmin'); 
                 } 
        return view('dashboard.dashboardPatient'); 
    }
}

