@extends('layout.main')

@section('top-title')
    Marcas
@endsection

@section('title')
    <h1 class="mt-4">Marcas</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">Marcas</li>

    <a class="btn btn-primary m-auto 5rem" href="{{ route('marcas.create') }}" role="button">
        <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <h1>Todas las Marcas</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Activo</th>
                <th>Creado hace</th>
                <th>Fecha de Registro</th>
                <th>Actualizado hace</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td>{{ $marca->fecha }}</td>
                    <td>
                        @if($marca->activo)
                            <span class="badge bg-success">Sí</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>{{ $marca->created_at->diffForHumans() }}</td>
                    <td>{{ $marca->created_at->format('d/m/Y h:i:s') }}</td>
                    <td>{{ $marca->updated_at->format('d/m/Y h:i:s') }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('marcas.show', $marca->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar esta marca?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                        <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-book"></i>
                        </a>
                    </td>
                </tr>
            @endforeach 		
        </tbody>
    </table>
@endsection
