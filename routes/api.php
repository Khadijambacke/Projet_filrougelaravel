<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\V1\AuthApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/ping',  function (Request $request) {
      
    return response()->json([
        'success' => true,
        'message' => 'api v1 fonctionne correctement',
        'Heure'=>now()
    ],200);
});


   Route::post('/auth/login', [AuthApiController::class, 'login']);
   Route::post('/auth/register', [AuthApiController::class, 'register']);

   /**
    * Routes SERVICES (publiques)
    */
   Route::get('/services', [ServiceApiController::class, 'index']);
   Route::get('/services/{service}', [ServiceApiController::class, 'show']);

   /**
    * ============================================
    * API V1 - PROTÉGÉES (authentification requise)
    * ============================================
    */
   Route::middleware('auth:sanctum')->group(function () {

       /**
        * Routes AUTHENTIFICATION (protégées)
        */
       Route::post('/auth/logout', [AuthApiController::class, 'logout']);
       Route::get('/auth/me', [AuthApiController::class, 'me']);
});
});



