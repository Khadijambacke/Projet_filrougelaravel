<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Reservation;
use App\Models\Service;

class DashboardController extends Controller
{
    ///sur les routes parfois on utiise request
   
    public function index()
    { 
        $user = Auth::user(); 
        $nbrrendezvous=Reservation::where('user_id', $user->id)->count();
        $recentReservations = Reservation::where('user_id', $user->id)
        ->latest()
        ->take(5)
        ->get();

        ///check
        //dd($user):permet de voir l'errur comme cho
        if (!$user) {
            return redirect()->route('show.register'); 
        }
       if ($user->role === 'medecin') {
    return view('dashboard.dashboardMedecin');
} elseif ($user->role === 'admin') {
    return view('dashboard.dashboardAdmin');
} else {
    return view('dashboard.dashboardPatient', compact('nbrrendezvous'));
}

    }
}

