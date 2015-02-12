@extends('backend.layout')

@section('title')
    Users
@stop

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit User <small>{{ $user->username }}</small>
            </h1>
            

        </div>
    </div>
<br/>
@stop

@section('content')
<form method="POST" action="{{{ URL::to('users/update') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <input type="hidden" name="id" value="{{ $user->id }}">
    <fieldset>
        <div class="form-group">
            <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{ $user->username }}">
        </div>
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="role">Rol:</label>
            {{ Form::select('role[]', Role::lists('name', 'id'), $roles, array('class' => 'form-control', 'multiple')) }}
        </div>
        

        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>

    </fieldset>
</form>
@stop

@section('scripts')

@stop

@section('css')

@stop