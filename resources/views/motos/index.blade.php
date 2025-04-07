@extends('layout.main')

@section('top-title')
    Motos
@endsection

@section('title')
    <h1 class="mt-4">Motos</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">Motos</li>

    <a class="btn btn-primary m-auto 5rem" href="{{ route('motos.create') }}" role="button">
        <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <h1>Todas las Motos</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>País</th>
                <th>Precio</th>
                <th>Activo</th>
                <th>Creado hace</th>
                <th>Registrado</th>
                <th>Actualizado hace</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($motos as $moto)
                <tr>
                    <td>{{ $moto->id }}</td>
                    <td>{{ $moto->nombre }}</td>
                    <td>{{ $moto->fecha }}</td>
                    <td>{{ $moto->pais?->nombre }}</td>
                    <td>${{ number_format($moto->precio, 2) }}</td>
                    <td>
                        @if($moto->activo)
                            <span class="badge bg-success">Sí</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>{{ $moto->created_at->diffForHumans() }}</td>
                    <td>{{ $moto->created_at->format('d/m/Y h:i:s') }}</td>
                    <td>{{ $moto->updated_at->format('d/m/Y h:i:s') }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('motos.show', $moto->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <form action="{{ route('motos.destroy', $moto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar esta moto?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                        <a href="{{ route('motos.edit', $moto->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-book"></i>
                        </a>
                    </td>
                </tr>
            @endforeach 		
        </tbody>
    </table>
@endsection
