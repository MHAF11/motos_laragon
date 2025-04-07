@extends('layout.main')

@section('top-title')
    Editar País
@endsection

@section('title')
    <h1 class="mt-4">Editar País</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('paises.index') }}">Países</a>
    </li>
    <li class="breadcrumb-item">Editar</li>
@endsection

@section('content')
    <form class="form border-1" action="{{ route('paises.update', $pais->id) }}" method="POST">
        @csrf
        @method('POST')

        <label for="nombre">Nombre del País: {{ $pais->nombre }}</label>
        <input type="text" name="nombre" class="form-control" value="{{ $pais->nombre }}" required>

        <label for="activo">Activo: {{ $pais->activo ? 'Sí' : 'No' }}</label>
        <select name="activo" class="form-control">
            <option value="1" {{ $pais->activo == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ $pais->activo == 0 ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('paises.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection
