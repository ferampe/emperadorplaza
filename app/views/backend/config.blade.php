@extends('backend.layout')

@section('title')
Terminos y Condiciones
@stop

@section('header')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Terminos y Condiciones
        </h1>

    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">

        @if (Session::has('success'))
            <div class="alert alert-success">
               {{Session::get('success')}}
            </div>
        @endif

        {{ Form::open(array('url' => 'admin/config/update', 'id' => 'formRoom')) }}
            {{ Form::hidden('config_id', $config->config_id, $attributes = array('id' => 'config_id')) }}

          

                    <p>&nbsp;</p>

                <div class="form-group">
                        {{ Form::label('terms_and_conditions', 'Terminos y condiciones:')}}
                        {{-- Form::text('terms_and_conditions', $config->terms_and_conditions, array('class' =>'form-control', 'placeholder' => '', 'autocomplete' => 'off'))--}}


                        <textarea name="terms_and_conditions" id="terms_and_conditions" class="ckeditor">{{ $config->terms_and_conditions}}</textarea>

                        @if ($errors->has())
                            <label class="error">{{ $errors->first('terms_and_conditions')  }}</label>
                        @endif
               

                </div>

        

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            {{ Form::close() }}

    </div>
</div>
@stop

@section('scripts')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

@stop

@section('css')

@stop
