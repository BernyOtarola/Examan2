@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Especies Exhibidas</h1>
    <div class="row">
        @foreach($species as $specie)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $specie->nombre }}</h5>
                    <p class="card-text">{{ $specie->descripcion }}</p>
                    <p><strong>Período:</strong> {{ $specie->período }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
