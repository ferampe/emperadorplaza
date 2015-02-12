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
    $(document).ready(function(){
        $('#calendar').multiDatesPicker({
            dateFormat: 'dd/mm/yy',
            addDisabledDates: ['06/02/2015', '06/03/2015'],
            minDate: 0,
            numberOfMonths: [1,2],
            altField: "#value_calendar" 
            /*onSelect: function(){
                alert(this.value);
            }*/
        });

        $("#values").bind('click', function(event){
            event.preventDefault(); 
            alert($('#calendar').multiDatesPicker('getDates'));
        })
    });
    </script>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
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

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tipo de Habitacion:</label>
                            <select name="" id="" class="form-control">
                                <option value="Simple">Simple</option>
                                <option value="Doble">Doble</option>
                                <option value="Triple">Triple</option>
                                <option value="Matrimonial">Matrimonial</option>

                            </select> 
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                           <label for="">Numero de Habitaciones:</label>
                           <input type="text" class="form-control">
                        </div>

                    </div>
                </div>
                <br/>
                

                <div class="form-group">    
                    
                    <label for="">Seleccione Fechas:</label>
                    <div id="calendar" class="box"></div>
                    <input type="hidden" class="form-control" id="value_calendar">
                    <br/>
                    <div class="row">
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/enable.png') }}" width="15px" height="15px" /> Dias Disponibles.</div>
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/icon_disabled_days.png') }}" width="15px" height="15px" /> Ocupados</div>
                        <div class="col-sm-4"><img src="{{ asset('front/css/images/ui-bg_diagonals-thick_18_b81900_40x40.png') }}" width="15px" height="15px" /> Seleccionados</div>
                    </div>  
            
                 </div>
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