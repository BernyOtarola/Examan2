<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Species; // Corrige el import con 'App' mayúscula
use App\Models\Attraction; // Corrige el import con 'App' mayúscula

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::all();
        return view('species.index', compact('species'), ['species' => $species]);
    }

    public function getSpeciesByAttraction($attractionId)
    {
        $attraction = Attraction::find($attractionId);

        if (!$attraction) {
            return response()->json(['error' => 'Atracción no encontrada'], 404);
        }

        $species = $attraction->species;
        return response()->json($species);
    }
}
