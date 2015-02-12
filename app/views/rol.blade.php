@extends('backend.layout')

@section('title')
    Rol
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rol
            </h1>
            <a href="{{ url('rol/create') }}" class="btn btn-sm btn-success">Add Rol</a>

        </div>
    </div>
<br/>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>                        
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($roles as $rol)
                    <tr>
                        <td>{{ $rol->name }}</td>
                        
                        <td><a href="{{ route('rol_edit', $rol->id) }}" class="btn btn-sm btn-primary">Edit</a> <a href="{{ route('rol_destroy', $rol->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de eliminar este item.?');">Delete</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop

@section('css')

@stop