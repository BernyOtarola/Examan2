@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Administrar Comentarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Atracción</th>
                <th scope="col">Detalles</th>
                <th scope="col">Calificación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <th scope="row">{{ $comment->id }}</th>
                <td>{{ $comment->nombre_usuario }}</td>
                <td>{{ $comment->attraction->titulo }}</td>
                <td>{{ $comment->detalles }}</td>
                <td>{{ $comment->calificación }}</td>
                <td>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
