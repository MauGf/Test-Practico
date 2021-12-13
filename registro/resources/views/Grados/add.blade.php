<?php
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('/grados') }}" role="button">Regresar</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Agregar Grado</h2>
    </div>
</div>
<div class="row">
    <div class="col">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/grado/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="grd_nombre" class="form-control" id="" value="{{ old('grd_nombre') }}" placeholder="Ingresar nombre de grado">
            </div>
           
            <div class="form-group">
                <label for="">Agregar Materias al grado</label>
                <select class="form-control" name="mat_materia_id[]" multiple="multiple">
                    @foreach($materias as $materia)
                        @if (old('mat_materia_id') && in_array($materia->id, old('mat_materia_id')))
                            <option selected="selected" value="{{ $materia->id }}">{{ $materias->mat_nombre }}</option>
                        @else
                            <option value="{{ $materia->id }}">{{ $materia->mat_nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>
@endsection
