<?php
$materiaIds = $grados->getMateriaIds();
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('grados') }}" role="button">Regresar</a>
        <a class="btn btn-primary" href="{{ url('grado/view/' . $grados->id) }}" role="button">Ver</a>
        <a class="btn btn-success" href="{{ url('/grado/add') }}" role="button">Crear nuevo grado</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Editar grado</h2>
    </div>
    @if ($status = session()->get('status'))
        <div class="col-lg-12">
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        </div>
    @endif
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
        <form action="{{ url('/grado/edit/' . $grados->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="grd_nombre" class="form-control" id="" value="{{ old('grd_nombre') ? old('grd_nombre') : $grados->grd_nombre }}" placeholder="Enter a title">
            </div>
            
            <div class="form-group">
                <label for="">Materias</label>
                <select class="form-control" name="mat_materia_id[]" multiple="multiple">
                    @foreach($materias as $materia)
                        @if (old('mat_materia_id'))
                            @if (in_array($materia->id, old('mat_materia_id')))
                                <option selected="selected" value="{{ $materia->id }}">{{ $materia->mat_nombre }}</option>
                            @else
                                <option value="{{ $materia->id }}">{{ $materia->mat_nombre}}</option>
                            @endif
                        @else
                            @if (in_array($grados->id, $materiaIds))
                                <option selected="selected" value="{{ $materia->id }}">{{ $materia->mat_nombre }}</option>
                            @else
                                <option value="{{ $materia->id }}">{{ $materia->mat_nombre }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection
