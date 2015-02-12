@extends('backend.layout')

@section('title')
    Edit Rol
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Rol
            </h1>
            

        </div>
    </div>
<br/>
@stop

@section('content')
<form method="POST" action="{{{ URL::to('rol/update') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <input type="hidden" name="id" value="{{ $rol->id }}">
    <fieldset>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $rol->name}}">
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">Permission</div>
          <div class="panel-body">

           
                @foreach ($permissions as $permission)
                    @if(in_array($permission->id, $arrPermissionEnable))
                        {{ Form::checkbox('permission[]', $permission->id, true)." ".$permission->display_name }} <br/>
                    @else 
                        {{ Form::checkbox('permission[]', $permission->id)." ".$permission->display_name }} <br/>
                    @endif
                @endforeach
            

            
          </div>
        </div>
  

        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </fieldset>
</form>
@stop

@section('scripts')

@stop

@section('css')

@stop