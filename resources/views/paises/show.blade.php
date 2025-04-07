@extends('layout.main')
@section('top-title')
    Pais: {{ $pais->nombre }}
@endsection
@section('title')
    <h1 class="mt-4">pais - {{ $pais->nombre }}</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('paises.index')}}"> paises</a>
    </li>
    <li class="breadcrumb-item">{{ $pais->nombre}}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ $pais->nombre }}</div>
        <div class="card-body">
            <p class="card-text">ID: <strong>{{ $pais->id }}</strong></p>
            <p class="card-text">Nombre: {{ $pais->nombre }}</p>
            <p class="card-text">Creado: {{ $pais->created_at->diffForHumans() }}</p>
            <p class="card-text">Actualizado: {{ $pais->updated_at->diffForHumans() }}</p>
        </div>
    </div>


@endsection