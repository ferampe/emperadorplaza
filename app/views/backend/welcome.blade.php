@extends('backend.layout')

@section('title')
    Welcome
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome
            </h1>
        </div>
    </div>
<br/>
@stop

@section('content')
<h3>Choose a site</h3>
<div class="list-group">
  @foreach($sites as $country)
    <a href="{{ url('admin/changeSite/'.$country->country_id) }}" class="list-group-item"> {{ $country->name }}</a>
  @endforeach
</div>
@stop

@section('scripts')

@stop

@section('css')

@stop
