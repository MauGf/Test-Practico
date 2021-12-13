@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('grados') }}" role="button">Regresar</a>
        <a class="btn btn-primary" href="{{ url('grado/edit/' . $grado->id) }}" role="button">Edit</a>
        <a class="btn btn-success" href="{{ url('grado/add') }}" role="button">Nuevo grado</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Grado</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Nombre</h3>
        <div>{{ $grado->grd_nombre }}</div>
        <div>&nbsp;</div>
        <h3>Materias</h3>
        <div>{{ $grado->getMateriaTitles() }}</div>
        <div>&nbsp;</div>
    </div>
</div>
@endsection
    