@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Libros</h2>
        </div>
        <div class="d-inline-block">
            <a href="{{ __('dashboard') }}" class="btn btn-primary">Home</a>
        </div>
        <div class="d-inline-block">
            <a href="{{route('libros.create')}}" class="btn btn-primary">Agregar libro</a>
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
                <th>Titulo</th>
                <th>Autor</th>
                <th>isbn</th>
                <th>Acción</th>
            </tr>
            @foreach ($libros as $libro)
                <tr>
                    <td class="fw-bold">{{$libro->titulo}}</td>
                    <td>{{$libro->autor}}</td>
                    <td>
                    {{$libro->isbn}}
                    </td>
                    <td>
                        <a href="{{ __('prestamos') }}" class="btn btn-success">Prestar</a>

                        <a href="{{route('libros.edit', $libro)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('libros.destroy', $libro)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$libros->links()}}
    </div>
</div>
@endsection
