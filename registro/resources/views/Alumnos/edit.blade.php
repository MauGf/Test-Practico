@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('alumnos') }}" role="button">Regresar</a>
        <a class="btn btn-primary" href="{{ url('alumno/view/' . $alumno->id) }}" role="button">Ver</a>
        <a class="btn btn-success" href="{{ url('/alumno/add') }}" role="button">Crear nuevo alumno</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Editar alumno</h2>
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
        <form action="{{ url('/alumno/edit/' . $alumno->id) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Codigo</label>
                <input type="text" name="alm_codigo" class="form-control" id="" value="{{ old('alm_codigo') ? old('alm_codigo') : $alumno->alm_codigo }}" placeholder="Ingresar codigo">
            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="alm_nombre" class="form-control" id="" value="{{ old('alm_nombre') ? old('alm_nombre') : $alumno->alm_nombre }}" placeholder="Ingresar nombre">
            </div>
            <div class="form-group">
                <label for="">Edad</label>
                <input type="text" name="alm_edad" class="form-control" id="" value="{{ old('alm_edad') ? old('alm_edad') : $alumno->alm_edad }}" placeholder="Ingresar edad">
            </div>
            <div class="form-group">
                <label for="">Sexo</label>
                <input type="text" name="alm_sexo" class="form-control" id="" value="{{ old('alm_sexo') ? old('alm_sexo') : $alumno->alm_sexo }}" placeholder="Ingresar sexo">
            </div>
            <div class="form-group">
                <label for="">Grado</label>
                <select type="text" name="grd_id" class="form-control" id="" value="{{ old('grd_id') ? old('grd_id') : $alumno->grd_id }}" placeholder="Ingresar nombre de grado">
                @foreach($grados as $grado)
                <option value="{{$grado->id}}">{{$grado->grd_nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Observaciones</label>
                <textarea type="text"  name="alm_observacion" class="form-control" id="" value="{{ old('alm_observacion') ? old('alm_observacion') : $alumno->alm_observacion }}" placeholder="Observaciones"></textarea>
            </div>
            
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection
