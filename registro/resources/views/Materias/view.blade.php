@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('materias') }}" role="button">Regresar</a>
        <a class="btn btn-primary" href="{{ url('materia/edit/' . $materia->id) }}" role="button">Edit</a>
        <a class="btn btn-success" href="{{ url('materia/add') }}" role="button">Nueva Materia</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Materia</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Nombre</h3>
        <div class="mb-3">{{ $materia->mat_nombre }}</div>
        
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <h3>Grado asociados</h3>
        @foreach ($materia->grados as $grado)
        <div class="row mb-3">
            <div class="col-md-4">{{ $grado->grd_nombre }}</div>
            <div class="col-md-4"><a href="{{ url('/grado/view/' . $grado->id) }}">Ver</a></div>
        </div>
        @endforeach
    </div>
</div>
@endsection
    