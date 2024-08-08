@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Atracciones del Parque</h1>
    @if($attractions->isEmpty())
        <p>No hay atracciones disponibles en este momento.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Especie</th>
                        <th scope="col">Calificación Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attractions as $attraction)
                    <tr>
                        <th scope="row">{{ $attraction->id }}</th>
                        <td>{{ $attraction->titulo }}</td>
                        <td>{{ $attraction->descripcion }}</td>
                        <td>{{ $attraction->species->nombre }}</td>
                        <td>{{ $attraction->averageRating() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
