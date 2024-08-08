<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        return response()->json(['message' => 'Comentario guardado con éxito']);
    }

    public function countComments($attractionId)
    {
        $count = Comment::where('id_atraccion', $attractionId)->count();
        return response()->json(['count' => $count]);
    }


}
