<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use app\Models\Reservation;
use app\Models\users;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\LoginRequest;

class MedecinController extends Controller
{
    public function index(){
        return view('services.index');
    }
}
