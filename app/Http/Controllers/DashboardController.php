<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


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
            return view('dashboard.dashboardAdmin'); 
                } if ($user->role === 'admin') { 
                    return view('dashboard.dashbordMedecin'); 
                 } 
        return view('dashboard.dashboardPatient'); 
    }
}

