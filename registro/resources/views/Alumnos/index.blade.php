<?php
$filter = request()->query('filter');
$filterTitle = '';

if ($filter) {
    if (isset($filter['alm_nombre'])) {
        $filterTitle = $filter['alm_nombre'];
    }
}
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('/alumno/add') }}" role="button">Agregar Alumno</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Alumnos</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <form action="{{ url('/alumnos') }}">
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Title</label>
                    <input type="text" name="filter[title]" value="{{ $filterTitle }}" class="form-control" id="inlineFormInputName" placeholder="Enter a title">
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url('/alumnos') }}" class="btn btn-primary">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Grado</th>

                    <th scope="col">Materias</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                    <th scope="row">{{ $alumno->id }}</th>
                    <td>{{ $alumno->alm_nombre }}</td>
                    <td>{{ $alumno->grados->grd_nombre}}</td>
                    <td>{{ $alumno->grados->getMateriaTitles()}}</td>
                   
                    <td>
                        <a class="btn btn-success" href="{{ url('/alumno/view/' . $alumno->id) }}" role="button"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-primary" href="{{ url('/alumno/edit/' . $alumno->id) }}" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger item-delete" href="#" role="button" data-item-id="{{ $alumno->id }}"><i class="fa fa-trash"></i></a>
                        <form class="item-delete-form" action="{{ url('/alumno/delete/' . $alumno->id) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $(".item-delete").click(function(event) {
        var itemId = $(this).data('item-id');
        var confirmed = confirm('Esta seguro de borrar el grado #' + itemId + '?');

        if (confirmed == false) {
            event.preventDefault();
        } else {
            $(this).next('.item-delete-form').submit();
        }
    });
    
});
</script>
@endsection
    
