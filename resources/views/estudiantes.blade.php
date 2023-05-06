@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Estudiantes</h2>
        </div>
        <div class="d-inline-block">
            <a href="{{ __('dashboard') }}" class="btn btn-primary">Home</a>
        </div>
        <div class="d-inline-block">
            <a href="{{route('estudiantes.create')}}" class="btn btn-primary">Agregar estudiante</a>
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
                <th>Nombre completo</th>
                <th>Cedula</th>
                <th>Acción</th>
            </tr>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td class="fw-bold">{{$estudiante->nombre_completo}}</td>
                    <td>{{$estudiante->cedula}}</td>
                    <td>
                        <a href="{{route('estudiantes.edit', $estudiante)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('estudiantes.destroy', $estudiante)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$estudiantes->links()}}
    </div>
</div>
@endsection
