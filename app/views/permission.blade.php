@extends('backend.layout')

@section('title')
    Permission
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Permission
            </h1>
            <a href="{{ url('permission/create') }}" class="btn btn-sm btn-success">Add Permission</a>

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
                        <th>Display Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->display_name }}</td>
                        
                        <td><a href="{{ route('permission_edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a> <a href="{{ route('permission_destroy', $permission->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de eliminar este item.?');">Delete</a></td>
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