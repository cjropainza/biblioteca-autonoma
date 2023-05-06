@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Prestamos</h2>
        </div>
        <div class="d-inline-block">
            <a href="{{ __('dashboard') }}" class="btn btn-primary">Home</a>
        </div>
        <div class="d-inline-block">
            <a href="{{route('prestamos.create')}}" class="btn btn-primary">Crear Prestamo</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}</strong>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Nombre de Libro</th>
                <th>Nombre Estudiante</th>
                <th>Fecha del Prestamo</th>
                <th>Fecha del Devolucion</th>
            </tr>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td class="fw-bold">{{$prestamo->libro_id}}</td>
                    <td>{{$prestamo->estudiante_id}}</td>
                    <td>
                    {{$prestamo->fecha_prestamo}}
                    </td>
                    <td>
                    {{$prestamo->fecha_fecha_devolucion}}
                    </td>
                    <td>

                        <a href="{{route('prestamos.edit', $prestamo)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('prestamos.destroy', $prestamo)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$prestamos->links()}}
    </div>
</div>
@endsection
