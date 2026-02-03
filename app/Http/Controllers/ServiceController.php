<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Http\Models;
use App\Models\User;
use App\Models\Service;


use App\Models\Livre;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;





class ServiceController extends Controller
{
    public function index()
    { 

        $services = Service::where('statut', 'actif')->with('medecin')->get();
        $medecins = User::where('role', 'medecin')->get();
        //return view('messervices.index', compact('services'));
        ///aulieu d'abord une seu;l pages index dans services je'opte poour deux pages
        $user = Auth::user(); 
        if($user->role === 'admin'){
            return view('admin.services.index', compact('services', 'medecins'));
        }
         return view('patient.services.index', compact('services'));
    }
// public function create(){
//     $medecins = User::where('role', 'medecin')->get();
//     return view('patient.services.index', compact('services', 'medecins'));

// }

public function store(Request $request)
{
   
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'prix' => 'required|numeric',
        'duree' => 'required|numeric',
        'statut' => 'required|string',
        'medecin_id'=> 'required|exists:users,id', // assure que le medecin existe
    ]);
    // Crée le service
    Service::create($validated);
    return redirect()
    ->route('servicsadmin')
    ->with('success', 'Service créé avec succès');
}

public function show($id)
{ 
    $service = Service::with('medecin')->findOrFail($id); 
    return view('messervices.show', compact('service')); 
}
public function edit($services){
    $medecins = User::where('role', 'medecin')->get();
    $service=Service::findOrFail($services);
    return view('messervices.edit', compact('service', 'medecins'));
}
public function update(Request $request,$service)
{
    $service = Service::findOrFail($service);

    $validated = $request->validate([
        'titre'       => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'prix'        => 'required|numeric',
        'statut'      => 'required',
        'medecin_id'  => 'required|exists:users,id',
    ]);
    $service->update($validated);
    return redirect()
        ->route('servicsadmin')
        ->with('success', 'Service mis à jour avec succès');
    
}
public function delete(Request $request,$service){
    $service = Service::findOrFail($service);
    $service->delete();
    return redirect()
    ->route('servicsadmin')
    ->with('success', 'Service supprime avec succès');
     
}



}
