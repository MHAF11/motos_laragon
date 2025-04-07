@extends('layout.main')
@section('top-title')
    Marca: {{ $marca->nombre }}
@endsection
@section('title')
    <h1 class="mt-4">marca - {{ $marca->nombre }}</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('marcas.index')}}"> marcas</a>
    </li>
    <li class="breadcrumb-item">{{ $marca->nombre}}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ $marca->nombre }}</div>
        <div class="card-body">
            <p class="card-text">ID: <strong>{{ $marca->id }}</strong></p>
            <p class="card-text">Nombre: {{ $marca->nombre }}</p>
            <p class="card-text">Creado: {{ $marca->created_at->diffForHumans() }}</p>
            <p class="card-text">Actualizado: {{ $marca->updated_at->diffForHumans() }}</p>
        </div>
    </div>


@endsection