@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Prestamo</h2>
        </div>
        <div>
            <a href="{{route('prestamos.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Revisa que no falte algun campo</strong> Algo fue mal...<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Libro:</strong>
                <select name="libro_id" class="form-control">
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Estudiante:</strong>
                <select name="estudiante_id" class="form-control">
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre_completo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
            <div class="form-group">
                <strong>Fecha del Prestamo:</strong>
                <input type="date" name="fecha_prestamo" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
            <div class="form-group">
                <strong>Fecha del Devolucion:</strong>
                <input type="date" name="fecha_devolucion" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Crear Prestamo</button>
        </div>
    </div>
</form>

@endsection
