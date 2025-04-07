@extends('layout.main')

@section('top-title')
    Crear País
@endsection

@section('title')
    <h1 class="mt-4">Crear País</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('paises.index') }}">Países</a>
    </li>
    <li class="breadcrumb-item">Crear País</li>
@endsection

@section('content')
    <form action="{{ route('paises.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del País:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del país" required>
        </div>

        <div class="mb-3">
            <label for="activo" class="form-label">Activo:</label>
            <select name="activo" id="activo" class="form-control" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear País</button>
    </form>
@endsection
