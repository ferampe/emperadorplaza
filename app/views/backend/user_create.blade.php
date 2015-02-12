@extends('backend.layout')

@section('title')
    User Create
@stop

@section('header')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User Create
        </h1>

    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ $form }}
    </div>
</div>
@stop

@section('scripts')
@stop

@section('css')
@stop
