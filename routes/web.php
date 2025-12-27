<?php

use App\Http\Controllers\AuthController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
////pour prendre en compte es contollers
use app\Http\Controllers\ServiceController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ReservationController;
use illuminate\Http\Request;


///route qui insere dans la bse en appelant lafonction save()
// Route::get('/', function (Request $request) {
//     $post=new \App\Models\Service;
//     $post->titre ='Consultations directe';
//     $post->description  ='Consultations de second niveau';
//     $post->prix  =12000;
//     $post->duree =50;
//     $post->statut  ='actif';
//     $post->save()
//     return view('layouts.admin');
// })->name('home');
////returner tout les services
// Route::get("/mon", function (Request $request) {
//     return App\Models\Service::all();
///     $post= App\Models\Service::findOrFail($id);
///     il genere une erreure 404
///    return $post(l'id passer en url)
///////return to_route() pour faire des redirections

// });

////fonctoion calback
///nom de la  route (/) apres le chemin vers la route
///On peut regrouperd es routes par un prefix,un name
//les mildwares agit comme des filtre:on peut les passer deux parametre middleware(['auth', 'admin']);
Route::get('/', function () {

    return view('welcome');

})->name('home');


Route::get('/patient', function () {
    return view('layouts.patient');
})->name('patient.view');

Route::get('/addd', function () {
    return view('layouts.admin');
    
})->name('principale');

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware('auth')
->name('dashboard');

Route::get('/admininash', function () {
    return view('dashboard.dashboardAdmin');

})->name('monpage');
//nommer les routes permet de les utiliser  a partir du nom
//exemple:<a href="{{route'show.register}}" class="btn"> Register </a>
///avoir un bouttn qui utlise la fonction route pour nous afficher les url
////pouquoi quand quelqu'un se registre il le considere tout de suite comme un patient?

Route::get('/Showregister', [AuthController::class ,'ShowRegister'])->name('show.register');
Route::get('/login', action: [AuthController::class ,'Showlogin'])->name('show.login');
Route::post('/register', [AuthController::class ,'register'])->name('register');
Route::post('/login', action: [AuthController::class ,'login'])->name('login');
   
Route::get('/forgot' , function(){
    return view('Auth.forgot-password');
});

