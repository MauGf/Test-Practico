<?php
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('/alumnos') }}" role="button">Regresar</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Agregar Alumno</h2>
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
        <form action="{{ url('/alumno/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Codigo</label>
                <input type="text" name="alm_codigo" class="form-control" id="" value="{{ old('alm_codigo') }}" placeholder="Ingresar codigo">
            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="alm_nombre" class="form-control" id="" value="{{ old('alm_nombre') }}" placeholder="Ingresar nombre">
            </div>
            <div class="form-group">
                <label for="">Edad</label>
                <input type="text" name="alm_edad" class="form-control" id="" value="{{ old('alm_edad') }}" placeholder="Ingresar edad">
            </div>
            <div class="form-group">
                <label for="">Sexo</label>
                <input type="text" name="alm_sexo" class="form-control" id="" value="{{ old('alm_sexo') }}" placeholder="Ingresar sexo">
            </div>
            <div class="form-group">
                <label for="">Grado</label>
                <select type="text" name="grd_id" class="form-control" id="" value="{{ old('grd_id') }}" placeholder="Ingresar nombre de grado">
                @foreach($grados as $grado)
                <option value="{{$grado->id}}">{{$grado->grd_nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Observaciones</label>
                <textarea type="text"  name="alm_observacion" class="form-control" id="" value="{{ old('alm_observacion') }}" placeholder="Observaciones"></textarea>
            </div>
           
        
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>
@endsection
