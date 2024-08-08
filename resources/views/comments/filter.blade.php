@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Comentarios Filtrados</h1>
    @foreach($comments as $comment)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Comentario de {{ $comment->nombre_usuario }}</h5>
                <p class="card-text">{{ $comment->detalles }}</p>
                <p class="card-text"><small class="text-muted">Calificación: {{ $comment->calificación }}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection
