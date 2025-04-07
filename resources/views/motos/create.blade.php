@extends('layout.main')

@section('top-title')
    Crear Moto
@endsection

@section('title')
    <h1 class="mt-4">Crear Moto</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('motos.index') }}">Motos</a>
    </li>
    <li class="breadcrumb-item">Crear Moto</li>
@endsection

@section('content')
    <form action="{{ route('motos.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la moto" required>
        </div>

        <div class="mb-3">
            <label for="pais_id" class="form-label">País ID:</label>
            <input type="number" name="pais_id" id="pais_id" class="form-control" placeholder="ID del país" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" placeholder="Precio" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-primary mt-3">Crear Moto</button>
    </form>
@endsection
