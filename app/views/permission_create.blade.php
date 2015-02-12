@extends('backend.layout')

@section('title')
    Create Permission
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create Permission
            </h1>
            

        </div>
    </div>
<br/>
@stop

@section('content')
<form method="POST" action="{{{ URL::to('permission/store') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" >
        </div>
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input class="form-control" type="text" name="display_name" id="display_name" >
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