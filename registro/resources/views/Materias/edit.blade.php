@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('materias') }}" role="button">Regresar</a>
        <a class="btn btn-primary" href="{{ url('materia/view/' . $materias->id) }}" role="button">Ver</a>
        <a class="btn btn-success" href="{{ url('/materia/add') }}" role="button">Nueva materia</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Editar materia</h2>
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
        <form action="{{ url('/materia/edit/' . $materias->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="mat_nombre" class="form-control" id="" value="{{ old('mat_nombre') ? old('mat_nombre') : $materias->mat_nombre }}" placeholder="Ingresar nombre">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection
