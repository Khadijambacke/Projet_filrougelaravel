<?php

use Illuminate\Support\Facades\Route;
////pour prendre en compte es contollers
use app\Http\Controllers\ServiceController; 
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('layouts.admin');
});
////fonctoion calback
///nom de la  route (/) apres le chemin vers la route

Route::get('/addd', function () {
    return view('layouts.admin');
    
});
///
Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware('auth')
->name('dashboard');
//////
Route::get('/admininash', function () {
    return view('dashboard.dashboardAdmin');
});
Route::get('/register', function () {
    return view('Auth.register');

});
Route::get('/login', function () {
    return view('Auth.login');
    return view('dashboard.dashboardAdmin');
});
Route::get('/forgot' , function(){
    return view('Auth.forgot-password');
});

