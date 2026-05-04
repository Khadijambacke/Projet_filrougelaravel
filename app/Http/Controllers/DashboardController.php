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
        $services = Service::where('statut', 'actif')->with('medecin')->get();
        $nbrrendezvous=Reservation::where('user_id', $user->id)->count();
        $nextRdv = Reservation::where('user_id',$user->id )
        ->where('statut', 'confirmee')
         ->where('date_reservation', '>=', now())
        ->orderBy('date_reservation')
        ->orderBy('date_reservatin')
        ->first();
        ///check
        //dd($user):permet de voir l'errur comme echo
        if (!$user) {
            return redirect()->route('show.register'); 
        }
       if ($user->role === 'medecin') {
    return view('dashboard.dashboardPatient');
} elseif ($user->role === 'admin') {
    return view('dashboard.dashboardAdmin');
} else {
    return view('dashboard.dashboardPatient', compact('nbrrendezvous','nextRdv'));
    return view(('dashboard.dashboardPatient, compact '));

}

    }
}

