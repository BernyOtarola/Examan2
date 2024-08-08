<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;

// Agrupa las rutas que requieren autenticación con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Ruta para obtener la información del usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Ruta para cerrar sesión
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

// Rutas de autenticación que no requieren estar autenticado
Route::post('/login', [ApiAuthController::class, 'login']);
