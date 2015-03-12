@extends('backend.layout')

@section('title')
    Bloqueo de Fechas
@stop

@section('header')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Bloqueo de Fechas
        </h1>

    </div>
</div>
@stop

@section('content')
<div class="row">
{{ Form::open(array('url' => 'admin/date_block/update', 'id' => 'formDateBlock')) }}
    <div class="col-lg-12">
        @if (isset($_GET['success']))
            <div class="alert alert-success">
               {{ $_GET['success'] }}
            </div>
        @endif
            
        <div class="form-group">
            <label for="">Tipo de Habitacion:</label>
            <select name="room" id="room" class="form-control">
                @foreach($rooms as $room)
                    @if(isset($_GET['room']))
                        @if($_GET['room'] == $room->room_id)
                            <option value="{{ $room->room_id }}" selected>{{ $room->name }}</option>
                        @else
                            <option value="{{ $room->room_id }}" >{{ $room->name }}</option>
                        @endif
                    @else
                        <option value="{{ $room->room_id }}" >{{ $room->name }}</option>
                    @endif
                    
                @endforeach
                

            </select> 
        </div>

        <!--<a href="#" id="add" class="btn btn-sm btn-success">Agregar Fecha para bloquear.</a>-->
        <div class="row">
            
            <div class="col-lg-12">
               <label for="from">From</label>
                <input type="text" id="from" name="from">
                <label for="to">to</label>
                <input type="text" id="to" name="to">
            </div>
        </div>


        <br/>
        <br/>

    </div>

    <div class="row" >
        <div class="col-lg-12">
            <table class="table" id="list">
                <tr>
                    <th>Fecha</th>                    
                    <th>Accion</th>
                </tr>
                <tbody id="tbodyid">
                    
                </tbody>
            </table>
            
            <br/>
            <br/>

            <input type="submit" value="Guardar" />
        </div>
        
        

    </div>

{{ Form::close() }}
</div>
@stop

@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <script>
    $(document).on('focus',".calendar", function(){
        $(this).datepicker({
            dateFormat: "dd/mm/yy",
            minDate: -0
        });
    });

    $(document).on('click',".delete", function(){
        event.preventDefault();
        if(confirm("Esta Seguro deeliminar la fecha y el precio??")){
            $(this).closest("tr").remove();    
        }                 
    });

    $(document).ready(function(){
        loadDatePrices();

        $("#room").bind('change', function(){
            $(".alert-success").hide();
            loadDatePrices();
        });

        $("#add").bind('click', function(){
            event.preventDefault();

            $('#list > tbody:last').append('<tr><td><input type="text" class="form-control calendar" name="date[]" readonly></td><td><a href="#" class="btn btn-sm btn-danger delete">Eliminar</a></td></tr>');
        });

        $( "#from" ).datepicker({
          defaultDate: "+1w",
          dateFormat: "yy/mm/dd",
          changeMonth: true,
          
          onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
          }
        });
        $( "#to" ).datepicker({
          defaultDate: "+1w",
          dateFormat: "yy/mm/dd",
          changeMonth: true,
          
          onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
          },
          onSelect: function(){
            $.ajax({
                type: "post",
                url: "{{ url('range_date_block') }}",
                data: "from="+$("#from").val()+"&to="+$("#to").val()+"&price_general="+$("#price_general").val(),
                async: false,
                success: function(datos){
                    $("#from").val("");
                    $("#to").val("");
                    $("#price_general").val("");
                    $('#list > tbody:last').append(datos);
                }
            });
          }
        });

        
    });

    function loadDatePrices()
    {
        $("#tbodyid").empty();
       
        $.ajax({
            type: "post",
            url: "{{ url('admin/date_block/getDatesBlock') }}",
            data: $("#formDateBlock").serialize(),
            success: function(datos){
                
                $.each(datos, function(i, item){
                    var datef = item.date.split("-");
                    var dateFormat = datef[2]+"/"+datef[1]+"/"+datef[0];

                    console.log(item.price);
                    $('#list > tbody:last').append('<tr><td><input type="text" class="form-control calendar" name="date[]" value="'+dateFormat+'" readonly></td><td><a href="#" class="btn btn-sm btn-danger delete">Eliminar</a></td></tr>');
                });
            }
        });
    }
    </script>

@stop

@section('css')
    {{ HTML::style('front/css/mdp.css') }}
    {{ HTML::style('front/css/prettify.css') }}

    {{ HTML::script('front/js/prettify.js') }}
    {{ HTML::script('front/js/lang-css.js') }}
@stop
