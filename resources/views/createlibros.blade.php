@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Agregar libro</h2>
        </div>
        <div>
            <a href="{{route('libros.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('libros.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Titulo:</strong>
                    <input type="text" name="titulo" class="form-control" placeholder="Don Quijote de la Mancha" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Autor:</strong>
                    <input type="text" name="autor" class="form-control" placeholder="Miguel de Cervantes" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>isbn:</strong>
                    <input type="text" name="isbn" class="form-control" placeholder="978-3-16-148410-0" >
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection
