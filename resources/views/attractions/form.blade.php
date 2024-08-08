@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ isset($attraction) ? 'Editar' : 'Crear Nueva' }} Atracción</h2>
    <form action="{{ isset($attraction) ? route('attractions.update', $attraction) : route('attractions.store') }}" method="POST">
        @csrf
        @if(isset($attraction))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $attraction->titulo ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $attraction->descripcion ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="id_especie" class="form-label">Especie</label>
            <select class="form-select" id="id_especie" name="id_especie">
                @foreach($species as $specie)
                    <option value="{{ $specie->id }}" {{ (isset($attraction) && $attraction->id_especie == $specie->id) ? 'selected' : '' }}>{{ $specie->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
