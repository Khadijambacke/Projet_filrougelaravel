<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use App\Http\Models;
use App\Models\User;

use app\Models\Service;

class ServiceController extends Controller
{
    public function index()

{ 
    ///le service vient du model service
    
    $services = Service::where('statut', 'actif') 
                ->with('medecin') 
                ->get();  
    ///return view('services.index', compact('services'));
    dd($services);

} 
public function show($id)
{ 
    $service = Service::with('medecin')->findOrFail($id); 
return view('services.show', compact('service')); 
}
}
