<?php

namespace App\Http\Controllers;
use app\Models\Service;
use app\Models\User;
use app\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($service_id)
{ 
    $service = Service::findOrFail($service_id); 
return view('reservations.create', compact('service')); 
} 
public function store(Request $request)
{ 
    $validated = $request->validate([ 
'service_id' => 'required|exists:services,id', 
'date_reservation' => 'required|date|after_or_equal:today', 
'heure_reservation' => 'required', 
'commentaire' => 'nullable|string', 
    ]); 
    $validated['user_id'] = auth(); 
    $validated['statut'] = 'en_attente'; 
    Reservation::create($validated); 
return redirect('/mes-reservations') 
           ->with('success', 'Réservation enregistrée.'); 

} 

public function myReservations()
{ 
    $reservations = Reservation::with('service') 
                    ->where('user_id', auth()) 
                    ->get(); 
return view('reservations.patient_index', compact('reservations')); 
} 
public function cancel($id)
{ 
    $reservation = Reservation::findOrFail($id); 
if ($reservation->user_id != auth()) { 
        abort(403); 
    } 
    $reservation->update(['statut' => 'annulee']); 
return back()->with('success', 'Réservation annulée.'); 
} 
}
