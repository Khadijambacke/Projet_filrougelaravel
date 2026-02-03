<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use app\Models\Reservation;
use app\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\LoginRequest;

class MedecinController extends Controller
{
    public function index(){
        $medecins=User::where('role','medecin')->get();
        return view('medecin.index', compact('medecins'));

    }
    public function store(Request $request){
          $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string',
        'role' => 'required|string',
 // assure que le medecin existe
    ]);
    // Crée le service
    User::create($validated);
    return redirect()
    ->route('vuemedecin.index')
    ->with('success', 'medecin créé avec succès');

    }
    public function edit($medecin){
        $medecin = User::findOrFail($medecin);

        return view('medecin.edit', compact('medecin'));
    
    }
    public function update(Request $request,$medecin)
{
    $medecin = User::findOrFail($medecin);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string',
        'role' => 'required|string',
    ]);
    $medecin->update($validated);
    return redirect()
        ->route('vuemedecin.index')
        ->with('success', 'Service mis à jour avec succès');
}
public function  delete(Request $request,$medecin){
    $medecin = User::findOrFail($medecin);
    $medecin->delete();
    return redirect()->route('vuemedecin.index');
}

}
