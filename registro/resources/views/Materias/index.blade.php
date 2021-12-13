<?php
$filter = request()->query('filter');
$filterTitle = '';

if ($filter) {
    if (isset($filter['title'])) {
        $filterTitle = $filter['title'];
    }
}
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('/materia/add') }}" role="button">Agregar materia</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Materias</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <form action="{{ url('/materias') }}">
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Title</label>
                    <input type="text" name="filter[title]" value="{{ $filterTitle }}" class="form-control" id="inlineFormInputName" placeholder="Enter a title">
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url('/materias') }}" class="btn btn-primary">Clear</a>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($materias as $materia)
                    <tr>
                    <th scope="row">{{ $materia->id }}</th>
                    <td>{{ $materia->mat_nombre }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ url('/materia/view/' . $materia->id) }}" role="button"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-primary" href="{{ url('/materia/edit/' . $materia->id) }}" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger item-delete" href="#" role="button" data-item-id="{{ $materia->id }}"><i class="fa fa-trash"></i></a>
                        <form class="item-delete-form" action="{{ url('/materia/delete/' . $materia->id) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $materias->appends(request()->except('page'))->render() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $(".item-delete").click(function(event) {
        var itemId = $(this).data('item-id');
        var confirmed = confirm('Esta seguro de borrar el #' + itemId + '?');

        if (confirmed == false) {
            event.preventDefault();
        } else {
            $(this).next('.item-delete-form').submit();
        }
    });
    
});
</script>
@endsection
    
