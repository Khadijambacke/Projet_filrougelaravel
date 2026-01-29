<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Http\Models;
use App\Models\User;
use App\Models\Service;
use App\Models\Livre;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;





class ServiceController extends Controller
{
    public function index()
{ 
    ///le service vient du model service
    $services = Service::where('statut', 'actif') 
                ->with('medecin') 
                ->get();  
    return view('services.index', compact('services', 'medecin'));
    // dd($services);
} 
 public function store(Request $request) {
    $validated = $request->validate([  
        'titre' => 'required|string|max:255', 
        'description' => 'required|string|max:255', 
        'prix' => 'required', 
        'statut' => 'required', 
        $services = Service::create()
    ]);
    return redirect()->route('services.index');

}
public function show($id)
{ 
    $service = Service::with('medecin')->findOrFail($id); 
    
    return view('services.show', compact('service')); 
}


}
