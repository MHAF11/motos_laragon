@extends('layout.main')

@section('top-title')
    Paises
@endsection

@section('title')
    <h1 class="mt-4">Paises</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('index')}}"> Dashboard</a>
    </li>
    <li class="breadcrumb-item">Paises</li>

    <a class="btn btn-primary m-auto 5rem" href="{{ route('paises.create') }}" role="button">
        <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <h1>Todos los Países</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Activo</th>
                <th>Creado hace</th>
                <th>Registrado</th>
                <th>Actualizado hace</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais)
                <tr>
                    <td>{{ $pais->id }}</td>
                    <td>{{ $pais->nombre }}</td>
                    <td>
                        @if($pais->activo)
                            <span class="badge bg-success">Sí</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>{{ $pais->created_at->diffForHumans() }}</td>
                    <td>{{ $pais->created_at->format('d/m/Y h:i:s') }}</td>
                    <td>{{ $pais->updated_at->format('d/m/Y h:i:s') }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('paises.show', $pais->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <form action="{{ route('paises.destroy', $pais->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este país?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                        <a href="{{ route('paises.edit', $pais->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-book"></i>
                        </a>
                    </td>
                </tr>
            @endforeach 		
        </tbody>
    </table>
@endsection
