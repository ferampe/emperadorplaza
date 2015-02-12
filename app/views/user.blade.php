@extends('backend.layout')

@section('title')
    Users
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users
            </h1>
            <a href="{{ url('users/create') }}" class="btn btn-sm btn-success">Add User</a>

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
                        <th>Username</th>
                        <th>Rol</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{-- ($user->publish == 0 ? 'No' : 'Yes') --}}Rol</td>
                        <td><a href="{{ route('users_edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a> <a href="{{ route('users_destroy', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de eliminar este item.?');">Delete</a></td>
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