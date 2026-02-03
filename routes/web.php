<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::view('/', 'hospital')->name('hospital.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

use App\Http\Controllers\AuthController;
use Faker\Guesser\Name;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use illuminate\Http\Request;



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

///j'ai fais ca pour donner des restrictons au utilisateurs deja connecter pour qu'ils ne puissent avoir acces a ces pages
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'Showlogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'ShowRegister'])->name('show.register');
});
/////connection utilisateur
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot', function () {
    return view('Auth.forgot-password');
});
///deconnexion
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');;

/////tout ce qui est lier a un utilisateur 
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/dashboard-patient/services', [ServiceController::class, 'index'])
        ->name('patientservices');
});

/////tout ce qui est lier a un admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboardadmin/services', [ServiceController::class, 'index'])->name('servicsadmin');
    Route::post('/dashboardadmin/services/store', [ServiceController::class, 'store'])->name('storeservice');
    Route::get('/dashbordadmin/services/{service}/edit', [ServiceController::class, 'edit'])->name('editservice');
    Route::post('/dashboardadmin/services/{service}/update',[ServiceController::class, 'update'])->name('updateservice');
    Route::post('/dashboardadmin/services/{service}/delete',[ServiceController::class, 'delete'])->name('deleteservice');
    Route::get('/dashbordadmin/medecin', [MedecinController::class, 'index'])->name('medecnadmin');
    Route::get('/dashbordadmin/reservations', [ReservationController::class, 'index'])->name('reservationsnadmin');
});

////avant laravel breeze
//Route::get('/services', [ServiceController::class, 'index']);
// Route::get('/Showregister', [AuthController::class ,'ShowRegister'])->name('show.register');
// Route::get('/login', action: [AuthController::class ,'Showlogin'])->name('show.login');
// Route::post('/register', [AuthController::class ,'register'])->name('register');
// Route::post('/login', action: [AuthController::class ,'login'])->name('login');
// Route::middleware(['auth', 'role:medecin'])->group(function () {
//     Route::resource('medecins', MedecinController::class);
//    });
//////
//nommer les routes permet de les utiliser  a partir du nom
//exemple:<a href="{{route'show.register}}" class="btn"> Register </a>
///avoir un bouttn qui utlise la fonction route pour nous afficher les url
////pouquoi quand quelqu'un se registre il le considere tout de suite comme un patient?
