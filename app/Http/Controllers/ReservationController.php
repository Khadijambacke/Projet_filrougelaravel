<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ReservationController extends Controller
{
    //index pour l'admin
    public function index(){
        $reservations = Reservation::with(['user', 'service'])->latest()->get();
        return view('reservations.indexadmin', compact('reservations'));
    }
    public function create($service_id)
    {
        $service = Service::findOrFail($service_id);
        return view('reservations.create', compact('service'));
    }

    public function store(Request $request, Service $service )
    {
        $validated = $request->validate([
            'date_reservation' => 'required|date|after_or_equal:today',
            'heure_reservation' => 'required',
            'commentaire' => 'nullable|string',
        ]);
    
        Reservation::create([
            'user_id' => Auth::id(),
            'service_id' => $service->id, 
            'date_reservation' => $validated['date_reservation'],
            'heure_reservation' => $validated['heure_reservation'],
            'commentaire' => $validated['commentaire'] ?? null,
            'statut' => 'en_attente',
        ]);
    
        return redirect()
            ->route('servicspatient', $service->id)
            ->with('success', 'Réservation enregistrée.');
    }
   
    public function myReservations()
    {
        $reservations = Reservation::with('service')
            ->where('user_id', Auth::id())
            ->get();
        return view('patient.reservations.index', compact('reservations'));
    }
    public function update(Request $request, Reservation $reservation){
        $request->validate([
            'statut' => 'required|in:en_attente,confirmee,annulee,effectuee',
        ]);
        $reservation->update([
            'statut' => $request->statut,
        ]);
        return back()->with('success', 'Statut de la réservation mis à jour.');
    
    }
    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->user_id != auth()) {
            abort(403);
            ///interrompe un traitement http unauthorizer
        }
        if( $reservation->update(['statut' => 'en attente'])){
            return back()->with('errors', 'vous ne pouvez pas  annulée.');
        }
        $reservation->update(['statut' => 'annulee']);
        return back()->with('success', 'Réservation annulée.');
    }
}
