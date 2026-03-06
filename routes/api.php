<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/ping',  function (Request $request) {
      
    return response()->json([
        'success' => true,
        'message' => 'api v1 fonctionne correctement',
        'Heure'=>now()
    ]);
});
});




