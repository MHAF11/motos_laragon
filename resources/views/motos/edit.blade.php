@extends('layout.main')
@section('top-title')
    Editar tipo
@endsection
@section('title')
    <h1 class="mt-4">Editar tipo</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('motos.index') }}">tipos</a></li>
    <li class="breadcrumb-item">Editar</li>
    
    
@endsection

@section('content')
    <form
    class="form border-1"
    action="{{ route('motos.update', $moto->id) }}" method="POST">
    @csrf
    @method('PUT')
        <label for="">Nombre: {{ $moto->name}}</label>
        <input type="text" name="nombre" class="form-control" value="{{ $moto->name }}" required>
        <label for="">Precio: {{ $moto->price}}</label>
        <input type="text" name="precio" class="form-control" value="{{ $moto->price }}" required>
        <label for="">Fecha: {{ $moto->date}}</label>
        <input type="date" name="fecha" class="form-control" value="{{ $moto->fecha }}" required>
        <label for="">Pais: {{ $moto->pais->name}}</label>
        <input type="number" name="pais_id" class="form-control" value="{{ $moto->pais_id }}" required>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('motos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection