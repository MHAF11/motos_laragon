@extends('layout.main')

@section('top-title')
    Editar Marca
@endsection

@section('title')
    <h1 class="mt-4">Editar Marca</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('marcas.index') }}">Marcas</a>
    </li>
    <li class="breadcrumb-item">Editar</li>
@endsection

@section('content')
    <form class="form border-1" action="{{ route('marcas.update', $marca->id) }}" method="POST">
        @csrf
        @method('POST')

        <label for="nombre">Nombre: {{ $marca->nombre }}</label>
        <input type="text" name="nombre" class="form-control" value="{{ $marca->nombre }}" required>

        <label for="fecha">Fecha: {{ $marca->fecha }}</label>
        <input type="date" name="fecha" class="form-control" value="{{ $marca->fecha }}" required>

        <label for="activo">Activo: {{ $marca->activo ? 'Sí' : 'No' }}</label>
        <select name="activo" class="form-control">
            <option value="1" {{ $marca->activo == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ $marca->activo == 0 ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('marcas.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection
