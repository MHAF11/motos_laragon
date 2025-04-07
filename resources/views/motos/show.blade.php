@extends('layout.main')
@section('top-title')
    Moto: {{ $moto->nombre }}
@endsection
@section('title')
    <h1 class="mt-4">moto - {{ $moto->nombre }}</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('motos.index')}}"> motos</a>
    </li>
    <li class="breadcrumb-item">{{ $moto->nombre}}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ $moto->nombre }}</div>
        <div class="card-body">
            <p class="card-text">ID: <strong>{{ $moto->id }}</strong></p>
            <p class="card-text">Nombre: {{ $moto->nombre }}</p>
            <p class="card-text">Fecha: {{ $moto->fecha }}</p>
            <p class="card-text">Pais: {{ $moto->pais->nombre }}</p>
            <p class="card-text">Precio: {{ $moto->precio }}</p>
            <p class="card-text">Creado: {{ $moto->created_at->diffForHumans() }}</p>
            <p class="card-text">Actualizado: {{ $moto->updated_at->diffForHumans() }}</p>
        </div>
    </div>



@endsection