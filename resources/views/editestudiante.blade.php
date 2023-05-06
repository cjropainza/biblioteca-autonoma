@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar estudiante</h2>
        </div>
        <div>
            <a href="{{route('estudiantes.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('estudiantes.update', $estudiante)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre completo:</strong>
                    <input type="text" name="nombre_completo" class="form-control" placeholder="Juanito de los palotes" value="{{$estudiante->nombre_completo}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Cedula:</strong>
                    <input type="text" name="cedula" class="form-control" placeholder="1151962907" value="{{$estudiante->cedula}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
