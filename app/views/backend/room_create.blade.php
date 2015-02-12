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

    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
         <p>&nbsp;</p>

        {{ Form::open(array('url' => 'admin/room/store', 'id' => 'formRoom')) }}

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#sectionA">Information </a></li>               

            </ul>

            <div class="tab-content">

                <div id="sectionA" class="tab-pane fade in active">
                    <p>&nbsp;</p>

                    <div class="form-group">
                        {{ Form::label('name', 'Nombre:')}}
                        {{ Form::text('name','',array('class' =>'form-control', 'placeholder' => '', 'autocomplete' => 'off'))}}
                        @if ($errors->has())
                            <label class="error">{{ $errors->first('name')  }}</label>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('general_price', 'Precio General:') }}
                        {{ Form::text('general_price','',array('class' =>'form-control', 'placeholder' => '', 'autocomplete' => 'off'))}}
                        @if ($errors->has())
                            <label class="error">{{ $errors->first('general_price')  }}</label>
                        @endif
                    </div>


                    <div class="form-group">                        
                        {{ Form::label('description', 'Title Icon:')}}
                        {{ Form::textarea('description','',array('class' =>'form-control', 'placeholder' => "", 'rows' => '2'))}}                        
                    </div>

                </div>

            </div>


            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Grabar</button>
            </div>

        {{ Form::close() }}

    </div>
</div>
@stop

@section('scripts')

    {{ HTML::script('backend/js/plugins/colorbox/jquery.colorbox-min.js') }}
    {{ HTML::script('/packages/barryvdh/laravel-elfinder/js/standalonepopup.min.js') }}

    {{ HTML::script('backend/js/plugins/slugger/jquery.slugger.js') }}
    {{ HTML::script('backend/js/plugins/silviomoreto/bootstrap-select.min.js') }}
    {{ HTML::script('backend/js/plugins/ckeditor/ckeditor.js') }}

    {{ HTML::script('backend/js/plugins/validate/jquery.validate.min.js') }}


    

    <script type="text/javascript">
         $(document).ready( function() {
            $("#formPhysicalDifficulty").validate({
                ignore: "",
                rules: {
                    name: "required"
                }
            });

            $("#name").slugger({
              slugInput: $("#url")
            });
        });
    </script>



@stop

@section('css')

@stop
