<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::with('species')
            ->withAvg('comments', 'calificación')
            ->get();

        return view('attractions.index', compact('attractions'), ['attractions' => $attractions]);
    }
    public function attractionsBySpecies($speciesId)
    {
        $attractions = Attraction::where('id_especie', $speciesId)->get();
        return response()->json($attractions);
    }
    public function averageRatingBySpecies($speciesId)
    {
        $averageRating = Attraction::where('id_especie', $speciesId)
            ->with('comments')
            ->get()
            ->pluck('comments')
            ->flatten()
            ->avg('calificación');

        return response()->json(['averageRating' => $averageRating]);
    }
    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->update($request->all());
        return response()->json(['message' => 'Atracción actualizada con éxito']);
    }

}
