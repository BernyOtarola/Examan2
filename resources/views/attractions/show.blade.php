@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $attraction->titulo }}</h1>
    <p>{{ $attraction->descripcion }}</p>
    <p><strong>Especie:</strong> {{ $attraction->species->nombre }}</p>
    <p><strong>Calificación Promedio:</strong> {{ $attraction->averageRating() }}</p>

    <a href="{{ route('attractions.index') }}" class="btn btn-primary">Volver a la lista de atracciones</a>
</div>
@endsection
