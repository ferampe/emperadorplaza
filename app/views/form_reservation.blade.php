<?php
$paises = array(
        "Afghanistan",
        "Albania",
        "Algeria",
        "Andorra",
        "Angola",
        "Antigua and Barbuda",
        "Argentina",
        "Armenia",
        "Australia",
        "Austria",
        "Azerbaijan",
        "Bahamas",
        "Bahrain",
        "Bangladesh",
        "Barbados",
        "Belarus",
        "Belgium",
        "Belize",
        "Benin",
        "Bhutan",
        "Bolivia",
        "Bosnia and Herzegovina",
        "Botswana",
        "Brazil",
        "Brunei",
        "Bulgaria",
        "Burkina Faso",
        "Burundi",
        "Cambodia",
        "Cameroon",
        "Canada",
        "Cape Verde",
        "Central African Republic",
        "Chad",
        "Chile",
        "China",
        "Colombia",
        "Comoros",
        "Congo (Brazzaville)",
        "Congo",
        "Costa Rica",
        "Cote d'Ivoire",
        "Croatia",
        "Cuba",
        "Cyprus",
        "Czech Republic",
        "Denmark",
        "Djibouti",
        "Dominica",
        "Dominican Republic",
        "East Timor (Timor Timur)",
        "Ecuador",
        "Egypt",
        "El Salvador",
        "Equatorial Guinea",
        "Eritrea",
        "Estonia",
        "Ethiopia",
        "Fiji",
        "Finland",
        "France",
        "Gabon",
        "Gambia, The",
        "Georgia",
        "Germany",
        "Ghana",
        "Greece",
        "Grenada",
        "Guatemala",
        "Guinea",
        "Guinea-Bissau",
        "Guyana",
        "Haiti",
        "Honduras",
        "Hungary",
        "Iceland",
        "India",
        "Indonesia",
        "Iran",
        "Iraq",
        "Ireland",
        "Israel",
        "Italy",
        "Jamaica",
        "Japan",
        "Jordan",
        "Kazakhstan",
        "Kenya",
        "Kiribati",
        "Korea, North",
        "Korea, South",
        "Kuwait",
        "Kyrgyzstan",
        "Laos",
        "Latvia",
        "Lebanon",
        "Lesotho",
        "Liberia",
        "Libya",
        "Liechtenstein",
        "Lithuania",
        "Luxembourg",
        "Macedonia",
        "Madagascar",
        "Malawi",
        "Malaysia",
        "Maldives",
        "Mali",
        "Malta",
        "Marshall Islands",
        "Mauritania",
        "Mauritius",
        "Mexico",
        "Micronesia",
        "Moldova",
        "Monaco",
        "Mongolia",
        "Morocco",
        "Mozambique",
        "Myanmar",
        "Namibia",
        "Nauru",
        "Nepa",
        "Netherlands",
        "New Zealand",
        "Nicaragua",
        "Niger",
        "Nigeria",
        "Norway",
        "Oman",
        "Pakistan",
        "Palau",
        "Panama",
        "Papua New Guinea",
        "Paraguay",
        "Peru",
        "Philippines",
        "Poland",
        "Portugal",
        "Qatar",
        "Romania",
        "Russia",
        "Rwanda",
        "Saint Kitts and Nevis",
        "Saint Lucia",
        "Saint Vincent",
        "Samoa",
        "San Marino",
        "Sao Tome and Principe",
        "Saudi Arabia",
        "Senegal",
        "Serbia and Montenegro",
        "Seychelles",
        "Sierra Leone",
        "Singapore",
        "Slovakia",
        "Slovenia",
        "Solomon Islands",
        "Somalia",
        "South Africa",
        "Spain",
        "Sri Lanka",
        "Sudan",
        "Suriname",
        "Swaziland",
        "Sweden",
        "Switzerland",
        "Syria",
        "Taiwan",
        "Tajikistan",
        "Tanzania",
        "Thailand",
        "Togo",
        "Tonga",
        "Trinidad and Tobago",
        "Tunisia",
        "Turkey",
        "Turkmenistan",
        "Tuvalu",
        "Uganda",
        "Ukraine",
        "United Arab Emirates",
        "United Kingdom",
        "United States",
        "Uruguay",
        "Uzbekistan",
        "Vanuatu",
        "Vatican City",
        "Venezuela",
        "Vietnam",
        "Yemen",
        "Zambia",
        "Zimbabwe"
    );
?>
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
        

        $(document).on('click',".remove_fields", function(){
            event.preventDefault();
            if(confirm("Esta Seguro de eliminar la fecha y el precio??")){
                $(this).closest(".row").remove();    
            }                 
        });


        $("body").on("change", ".room", function(){
            numId = $(this).attr("id").split('-');
            $('#calendar-'+numId[1]).multiDatesPicker('destroy');
            $('#calendar-'+numId[1]).val("");
            instanceMultiDatePicker("calendar-"+numId[1], "room-"+numId[1]);

            $("#info-"+numId[1]).html("");

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
            data: "dates="+JSON.stringify(arrDatesGlobal)+"&room="+$("#room-"+id).val()+"&num_hab="+$("#num_hab-"+id).val(),
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
                var totalGeneral = 0;
                $(".totales").each(function(){
                    //alert($(this).val());

                    totalGeneral = totalGeneral + parseFloat($(this).val());
                });

                $("#totalGeneral").html("<p><strong>Total</strong> $"+totalGeneral+"</p>");
            }
        });
    }

    function loadDatesBlock(element_room)
    {
       //var arrDates = [];
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
            color: red;
            height: 34px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .ui-datepicker-trigger
        {
            height: 34px;
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
                    {{ Form::select("pais", $paises, null, array('class' => 'form-control')) }}
                    <!--<input type="text" name="pais" class="form-control" placeholder="Pais">-->
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

                <div class="row">
                    <div class="col-sm-12" id="totalGeneral">
                        
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