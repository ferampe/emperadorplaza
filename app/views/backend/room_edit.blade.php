@extends('backend.layout')

@section('title')
Editar Room
@stop

@section('header')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar Room: <small>{{ $room->name }}</small>
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

        {{ Form::open(array('url' => 'admin/room/update', 'id' => 'formRoom')) }}
            {{ Form::hidden('room_id', $room->room_id, $attributes = array('id' => 'room_id')) }}

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#sectionA">Information </a></li>
               
                

            </ul>

            <div class="tab-content">

            

                    <div id="sectionA" class="tab-pane fade in active">
                    <p>&nbsp;</p>

                    <div class="form-group">
                        {{ Form::label('name', 'Nombre:')}}
                        {{ Form::text('name', $room->name, array('class' =>'form-control', 'placeholder' => '', 'autocomplete' => 'off'))}}
                        @if ($errors->has())
                            <label class="error">{{ $errors->first('name')  }}</label>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('general_price', 'Precio General:') }}
                        {{ Form::text('general_price', $room->general_price, array('class' =>'form-control', 'placeholder' => '', 'autocomplete' => 'off'))}}
                        @if ($errors->has())
                            <label class="error">{{ $errors->first('general_price')  }}</label>
                        @endif
                    </div>


                    <div class="form-group">                        
                        {{ Form::label('description', 'Title Icon:')}}
                        {{ Form::textarea('description', $room->description, array('class' =>'form-control', 'placeholder' => "", 'rows' => '2'))}}                        
                    </div>

                </div>

                

            </div>

        

            


            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            {{ Form::close() }}

    </div>
</div>
@stop

@section('scripts')

    {{ HTML::script('backend/js/plugins/colorbox/jquery.colorbox-min.js') }}
    {{ HTML::script('/packages/barryvdh/laravel-elfinder/js/standalonepopup.min.js') }}

  
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
        });
    </script>

@stop

@section('css')

@stop
