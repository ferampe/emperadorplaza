
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
    var retValDatesBlock = new Array();

    //alert(typeof retValDatesBlock);
    var idCalendar = 1;
    var roomSelectHtml = '{{ $roomSelect }}';

    $(document).ready(function(){

        instanceMultiDatePicker("calendar-1", "room-1");
        

        $(document).on('click',".remove_fields", function(event){
            event.preventDefault();
            if(confirm("Esta Seguro de eliminar la fecha y el precio??")){
                $(this).closest(".row").remove(); 
                calculoGeneral();   
            }                 
        });


        $("body").on("change", ".room", function(){
            
            numId = $(this).attr("id").split('-');

            
            $('#calendar-'+numId[1]).multiDatesPicker('destroy');
            $('#calendar-'+numId[1]).val("");
            instanceMultiDatePicker("calendar-"+numId[1], "room-"+numId[1]);

            $("#info-"+numId[1]).html("");
            calculoGeneral();   

        });

        $("body").on("keyup", ".habi", function(){
            if (isNaN($(this).val())){
                alert ("Numero de Habitacion Invalido.");
                $(this).val(1);
            }

            var id = $(this).attr("id").split("-");
            var dates = $("#calendar-"+id[1]).multiDatesPicker('getDates');
            //var html = '';
            
            var arrDatesGlobal = new Array();
            $.each(dates, function (i, val)
            {
                
                var arrDates = val.split("/");
                var fecha_texto = arrDates[2]+"-"+arrDates[1]+"-"+arrDates[0];
                arrDatesGlobal.push(fecha_texto);

            });

            getDatesPrices(arrDatesGlobal, id[1]);
            

            //alert("cambio");
            //alert($(this).attr("id"));
            //alert($(this).val());
        });

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

            $('#habitaciones').append('<div class="row" id="clone_row"><div class="col-sm-4"><div class="form-group"><label for="">Tipo de Habitacion:</label>'+roomSelectHtml+'</div></div><div class="col-sm-2"><div class="form-group"><label for="">Cant. Hab:</label><input type="text" class="form-control habi" name="cat_hab[]" id="num_hab-'+idCalendar+'" value="1"></div></div><div class="col-sm-5"><div class="form-group"><label for="">Fechas:</label><br/><input type="text" name="dates[]" id="calendar-'+idCalendar+'" class=" calendar input-calendar"></div></div><div class="col-sm-1"><label>Eli..</label><a class="btn btn-danger remove_fields"><i class="glyphicon glyphicon-trash"></i></a></div><div class="row info" ></div><div class="col-sm-12" id="info-'+idCalendar+'"></div></div>');

            instanceMultiDatePicker("calendar-"+idCalendar, "room-"+idCalendar);
           

        });

    });

    function instanceMultiDatePicker(element_calendar, element_room)
    {
       
        loadDatesBlock(element_room);
        
        
        $("#"+element_calendar).multiDatesPicker({
            showOn: "button",
            buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
            dateFormat: 'dd/mm/yy',
            addDisabledDates: retValDatesBlock,
            minDate: 0,
            numberOfMonths: [1,2],                
            onSelect: function(){
               

                var id = $(this).attr("id").split("-");
                var dates = $(this).multiDatesPicker('getDates');
                //var html = '';
                
                var arrDatesGlobal = new Array();
                $.each(dates, function (i, val)
                {
                    
                    var arrDates = val.split("/");
                    var fecha_texto = arrDates[2]+"-"+arrDates[1]+"-"+arrDates[0];
                    arrDatesGlobal.push(fecha_texto);

                });

                getDatesPrices(arrDatesGlobal, id[1]);


            }
            
        });


        
    }

    function getDatesPrices(arrDatesGlobal, id)
    {
        $.ajax({
            type: "post",
            url: "{{ url('datesPrices') }}",
            data: "dates="+JSON.stringify(arrDatesGlobal)+"&room="+$("#room-"+id).val()+"&num_hab="+$("#num_hab-"+id).val()+"&hab="+$("#room-"+id+" :selected").text(),
            async: false,
            success: function(datos){
                console.log(datos);

                if($("#num_hab-"+id).val() > 1)
                {
                    var mensaje = "Reserva de <strong>"+$("#num_hab-"+id).val()+"</strong> habitaciones tipo <strong>"+$("#room-"+id+" :selected").text()+"</strong>";
                }else{
                    var mensaje = "Reserva de <strong>1</strong> habitacion tipo <strong>"+$("#room-"+id+" :selected").text()+"</strong>";
                }

                $("#info-"+id).html("<p>"+mensaje+"</p>"+datos+"<hr/>");
                //price = datos;
                //
                //
                calculoGeneral();
                
            }
        });
    }

    function calculoGeneral(){
        var totalGeneral = 0;
        $(".totales").each(function(){
            //alert($(this).val());

            totalGeneral = totalGeneral + parseFloat($(this).val());
        });

        $("#totalGeneral").html("<p><strong>Total</strong> $"+totalGeneral+"</p>");
    }

    function loadDatesBlock(element_room)
    {
       //var arrDates = [];
       retValDatesBlock = new Array();
        $.ajax({
            type: "post",
            url: "{{ url('datesBlocks') }}",
            data: "room="+$("#"+element_room).val(),
             async: false,
            success: function(datos){
                var cont = 0;
                //alert(datos);
                $.each(datos, function(i, item){
                    cont++;
                    retValDatesBlock.push(item.datef);
                });

                if(retValDatesBlock.length < 1){
                    retValDatesBlock.push(mostrarFecha(-1));
                }
                //console.log(retValDatesBlock.length);
                //console.log(mostrarFecha(-1));
                //retValDatesBlock = arrDates;
                //alert(retValDatesBlock);
            }
        });

    }

    function mostrarFecha(days){
        milisegundos=parseInt(35*24*60*60*1000);
        
        fecha=new Date();
        day=fecha.getDate();
        // el mes es devuelto entre 0 y 11
        month=fecha.getMonth()+1;
        year=fecha.getFullYear();
        
        //document.write("Fecha actual: "+day+"/"+month+"/"+year);
        
        //Obtenemos los milisegundos desde media noche del 1/1/1970
        tiempo=fecha.getTime();
        //Calculamos los milisegundos sobre la fecha que hay que sumar o restar...
        milisegundos=parseInt(days*24*60*60*1000);
        //Modificamos la fecha actual
        total=fecha.setTime(tiempo+milisegundos);
        day=fecha.getDate();
        month=fecha.getMonth()+1;
        year=fecha.getFullYear();

        //document.write("Fecha modificada: "+day+"/"+month+"/"+year);
        return day+"/"+month+"/"+year;
    }



    </script>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


    
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

        .input-calendar
        {
            
            height: 34px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .ui-datepicker-trigger
        {
            height: 34px;
        }

        #totalGeneral{
            background-color: #FCCE4A;
            font-weight: bold;
            font-size: 1em;
            margin-bottom: 5px;
            opacity: 0.5;
        }
    </style>
</head>
<body>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
            <h3>Calculo de su Reserva</h3>
            <br>
            <form action="#">

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
                               <input type="text" class="form-control habi" name="cat_hab[]" id="num_hab-1" value="1">
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                               <label for="">Fechas:</label>
                               <br/>
                                <input type="text" name="dates[]" id="calendar-1" class=" calendar input-calendar">  
                               
                            </div>
                        </div>                        
                        <div class="col-sm-12" id="info-1"></div>                    
                    </div>                    
                </div>                
                <div class="col-sm-12" id="totalGeneral"></div>
                
                <p><a href="#" id="add" class="btn btn-sm btn-success">Agregar tipo de habitacion</a></p>

                <br/>

                

                    
                
                <h3>Datos Personales</h3>
                <br>

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
                    {{ Form::select("pais", $paises, null, array('class' => 'form-control')) }}
                    <!--<input type="text" name="pais" class="form-control" placeholder="Pais">-->
                </div>            

                <div class="form-group">
                    <label for="">Comentarios:</label>
                    <textarea class="form-control" rows="7"></textarea>
                </div>

                <p>
                    <label>
                      <input type="checkbox"> <a href="#" data-toggle="modal" data-target="#myModal">Acepto los Terminos y condiciones.</a>
                    </label>
                </p>

                <input type="submit" value="Enviar Informacion">
            



            </form>
    </div>
    <div class="col-sm-3"></div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terminos y condiciones.</h4>
      </div>
      <div class="modal-body">
        {{ $terms->terms_and_conditions}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>