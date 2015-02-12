@extends('backend.layout')

@section('title')
    Edit Permission
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Permission
            </h1>
            

        </div>
    </div>
<br/>
@stop

@section('content')
<form method="POST" action="{{{ URL::to('permission/update') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <input type="hidden" name="id" value="{{ $permission->id }}">
    <fieldset>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $permission->name}}">
        </div>
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input class="form-control" type="text" name="display_name" id="display_name" value="{{ $permission->display_name}}">
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