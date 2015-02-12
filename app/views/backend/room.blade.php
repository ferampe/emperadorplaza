@extends('backend.layout')

@section('title')
    Rooms
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rooms
            </h1>
            <a href="{{ url('admin/room/create') }}" class="btn btn-sm btn-success">Agregar Room</a>

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
                        <th>Room Name</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>

                        <td><a href="{{ url('admin/room/edit').'/'.$room->room_id }}" class="btn btn-sm btn-primary">Edit</a> <a href="{{ url('admin/room/destroy').'/'.$room->room_id }}" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de eliminar este item.?');">Delete</a></td>
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
