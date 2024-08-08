<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Agrupar rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    // Rutas para perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para atracciones
    Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
    Route::get('/attractions/species/{speciesId}', [AttractionController::class, 'attractionsBySpecies']);
    Route::get('/attractions/average-rating/{speciesId}', [AttractionController::class, 'averageRatingBySpecies']);
    Route::put('/attractions/{id}', [AttractionController::class, 'update']);

    // Rutas para comentarios
    Route::post('/comments', [CommentController::class, 'store']);
    Route::get('/comments/between/{min}/{max}', [CommentController::class, 'commentsBetweenRatings']);
    Route::get('/comments/count/{attractionId}', [CommentController::class, 'countComments']);

    // Rutas para especies
    Route::get('/species', [SpeciesController::class, 'index'])->name('species.index');
    Route::get('/species/by-attraction/{attractionId}', [SpeciesController::class, 'getSpeciesByAttraction']);

    // Ruta para cerrar sesión
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Incluye las rutas de autenticación de Laravel Breeze o las configuradas manualmente
require __DIR__ . '/auth.php';
