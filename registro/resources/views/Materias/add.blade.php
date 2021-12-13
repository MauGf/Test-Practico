<?php
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('/materias') }}" role="button">Regresar</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Agregar materias</h2>
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
        <form action="{{ url('/materia/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="mat_nombre" class="form-control" id="" value="{{ old('mat_nombre') }}" placeholder="Titulo de materia">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection
