
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>

    <!-- loads jquery and jquery ui -->
    <!-- -->
    {{ HTML::script('front/js/jquery-1.11.1.js') }}
    {{ HTML::script('front/js/jquery-ui-1.11.1.js') }}
    <!-->
    {{ HTML::script('front/js/jquery-2.1.1.js') }}
    {{ HTML::script('front/js/jquery-ui-1.11.1.js') }}
    <!-- -->
    
    <!-- loads mdp -->
    {{ HTML::script('front/js/jquery-ui.multidatespicker.js') }}

    <script>
    var retValDatesBlock = null;
    var idCalendar = 1;
    var roomSelectHtml = '{{ $roomSelect }}';

    $(document).ready(function(){

        instanceMultiDatePicker();
        

        $(document).on('click',".remove_fields", function(){
            event.preventDefault();
            if(confirm("Esta Seguro deeliminar la fecha y el precio??")){
                $(this).closest(".row").remove();    
            }                 
        });


        $("body").on("change", ".room", function(){
            //alert($(this).val());

            numId = $(this).attr("id").split('-');

            //alert(numId[1]);

            var arrDates = [];
            $.ajax({
                type: "post",
                url: "{{ url('datesBlocks') }}",
                data: "room="+$("#room-"+numId[1]).val(),
                 async: false,
                success: function(datos){
                    console.log(datos);
                    var cont = 0;
                    $.each(datos, function(i, item){
                        cont++;
                        arrDates.push(item.datef);
                    });
                    retValDatesBlock = arrDates;
                }
            });

            $('#calendar-'+numId[1]).multiDatesPicker('destroy');

            $('#calendar-'+numId[1]).multiDatesPicker({
                dateFormat: 'dd/mm/yy',
                addDisabledDates: retValDatesBlock,
                minDate: 0,
                numberOfMonths: [1,2],
                altField: "#value_calendar"                     
            });

        })

        $("#add").bind('click', function(event){
            event.preventDefault();
           
            idCalendar++;

            $.ajax({
                type: "post",
                url: "{{ url('getBlockSelect') }}",
                data: "id="+idCalendar,
                async: false,
                success: function(datos){
                    roomSelectHtml = datos;
                }
            });

            $('#habitaciones').append('<div class="row" id="clone_row"><div class="col-sm-4"><div class="form-group"><label for="">Tipo de Habitacion:</label>'+roomSelectHtml+'</div></div><div class="col-sm-2"><div class="form-group"><label for="">Cant. Hab:</label><input type="text" class="form-control" name="cat_hab[]" id="num_hab-'+idCalendar+'"></div></div><div class="col-sm-4"><div class="form-group"><label for="">Fechas:</label><div class="input-group date" id="datetimepicker1"><input type="text" class="form-control calendar" name="dates[]" id="calendar-'+idCalendar+'" /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div></div><div class="col-sm-2"><label for="">Eliminar</label><a class="btn btn-danger remove_fields"><i class="glyphicon glyphicon-trash"></i></a></div></div>');

            var arrDates = [];
            $.ajax({
                type: "post",
                url: "{{ url('datesBlocks') }}",
                data: "room="+$("#room-"+idCalendar).val(),
                 async: false,
                success: function(datos){
                    var cont = 0;
                    $.each(datos, function(i, item){
                        cont++;
                        arrDates.push(item.datef);
                    });
                    retValDatesBlock = arrDates;
                }
            });

            
            $('#calendar-'+idCalendar).multiDatesPicker({
                dateFormat: 'dd/mm/yy',
                addDisabledDates: retValDatesBlock,
                minDate: 0,
                numberOfMonths: [1,2],
                altField: "#value_calendar" 
                /*onSelect: function(){
                    alert(this.value);
                }*/
            });
           



            //instanceMultiDatePicker();
        });

    });

    function instanceMultiDatePicker()
    {

        loadDatesBlock();

        $('.calendar').each(function(){
            $(this).multiDatesPicker({
                dateFormat: 'dd/mm/yy',
                addDisabledDates: retValDatesBlock,
                minDate: 0,
                numberOfMonths: [1,2],
                altField: "#value_calendar" 
                
            });
        });

        
        //console.log(retValDatesBlock);

        
    }

    function loadDatesBlock()
    {
       var arrDates = [];
        $.ajax({
            type: "post",
            url: "{{ url('datesBlocks') }}",
            data: "room="+$("#room-1").val(),
             async: false,
            success: function(datos){
                var cont = 0;
                $.each(datos, function(i, item){
                    cont++;
                    arrDates.push(item.datef);
                });
                retValDatesBlock = arrDates;
            }
        });

    }



    </script>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- loads some utilities (not needed for your developments) -->

    {{ HTML::style('front/css/mdp.css') }}
    {{ HTML::style('front/css/prettify.css') }}

    {{ HTML::script('front/js/prettify.js') }}
    {{ HTML::script('front/js/lang-css.js') }}

    <script type="text/javascript">
    $(function() {
        prettyPrint();
    });
    </script>

    <style>
        div.box{
         font-size:17px;
        }
    </style>
</head>
<body>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
            <h3>Reservation</h3>
            <br>
            <form action="#">
                

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Nombres y Apellidos">
                </div>

                <div class="form-group">
                    <label for="nombres">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="nombres">Telefono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                </div>

                <div class="form-group">
                    <label for="nombres">Pais</label>
                    <input type="text" name="pais" class="form-control" placeholder="Pais">
                </div>
                
                <div id="habitaciones">
                    <div class="row" id="clone_row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Tipo de Habitacion:</label>
                                <select name="room[]" id="room-1" class="form-control room">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->room_id }}" >{{ $room->name }}</option>
                                    @endforeach
                                    

                                </select> 
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                               <label for="">Cant. Hab:</label>
                               <input type="text" class="form-control" name="cat_hab[]" id="num_hab-1">
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                               <label for="">Fechas:</label>
                               

                               <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control calendar" name="dates[]" id="calendar-1" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                               
                            </div>


                            





                        </div>
                    </div>
                </div>
                <a href="#" id="add" class="btn btn-sm btn-success">Agregar MAs Habitaciones y Fechas</a>

                <br/><br/>
                

                <!--<div class="form-group">    
                    
                    <label for="">Seleccione Fechas:</label>
                    <div id="calendar" class="box"></div>
                    <input type="hidden" class="form-control" id="value_calendar">
                    <br/>
                    <div class="row">
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/enable.png') }}" width="15px" height="15px" /> Dias Disponibles.</div>
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/icon_disabled_days.png') }}" width="15px" height="15px" /> Ocupados</div>
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/ui-bg_diagonals-thick_18_b81900_40x40.png') }}" width="15px" height="15px" /> Seleccionados</div>
                    </div>  
            
                 </div>-->
                <br/>
                 

                 <div class="form-group">
                    <label for="">Comentarios:</label>
                    <textarea class="form-control" rows="7"></textarea>
                 </div>


            



            </form>
    </div>
    <div class="col-sm-3"></div>
</div>



<br>



<a href="#" id="values">Values</a>

</body>
</html>