@extends('layout.main')

@section('top-title')
    Crear Marca
@endsection

@section('title')
    <h1 class="mt-4">Crear Marca</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('marcas.index') }}">Marcas</a>
    </li>
    <li class="breadcrumb-item">Crear Marca</li>
@endsection

@section('content')
    <form action="{{ route('marcas.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la marca" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="activo" class="form-label">Activo:</label>
            <select name="activo" id="activo" class="form-control">
                <option value="1" selected>Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Marca</button>
    </form>
@endsection
