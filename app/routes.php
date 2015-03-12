<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('form', function(){
    
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


    $rooms = Room::all();

    $roomSelect = '<select name="room[]" id="room" class="form-control">';
    foreach($rooms as $room)
    {
        $roomSelect .= '<option value="'.$room->room_id.'" >'.$room->name.'</option>';
    }

    $roomSelect .= '</select>';
                                     

    $datesBlockQuery = DB::table('dates_block')
                     ->select(DB::raw('DATE_FORMAT(date, "%d/%m/%Y") as datef, room_id'))
                     ->where('date', '>=', date('Y-m-d')) 
                     ->get();

    $datesBlockArr = array();
    foreach ($datesBlockQuery as $dateblock) {
        $datesBlockArr[] = array($dateblock->datef, $dateblock->room_id);
    }



    $datesPriceQuery = DB::table('dates_prices')
                     ->select(DB::raw('DATE_FORMAT(date, "%d/%m/%Y") as datef, room_id, price'))
                     ->where('date', '>=', date('Y-m-d')) 
                     ->get();

    $datesPriceArr = array();
    foreach ($datesPriceQuery as $datePrice) {
        $datesPriceArr[] = array($datePrice->datef, $datePrice->room_id, $datePrice->price );
    }

                     //var_dump(DB::getQueryLog());

    $terms = Confige::find(1)->first();
  
    //echo "<pre>";
    //dd($datesBlockArr);
    //
    $datos = array('roomSelect' => $roomSelect, 'rooms' => $rooms, 'datesBlocks' => $datesBlockArr, 'datesPrices' => $datesPriceArr, 'paises' => $paises, 'terms' => $terms);

    return View::make('form_reservation', $datos);
});

Route::post('datesBlocks', function(){

    $datesBlockQuery = DB::table('dates_block')
                     ->select(DB::raw('DATE_FORMAT(date, "%d/%m/%Y") as datef, room_id'))
                     ->where('date', '>=', date('Y-m-d'))
                     ->where('room_id', '=', $_POST['room'])
                     ->get();

    return Response::json($datesBlockQuery);
});

/*Route::post('datesPrices', function(){
    $price = 0;

    $datesPriceQuery = DB::table('dates_prices')
                    ->select('price')
                    ->where('date', '=', $_POST['date'])
                    ->where('room_id', '=', $_POST['room'])
                    ->first();


    if($datesPriceQuery)
    {
        $price = $datesPriceQuery->price;
        
    }else{
        $datesPriceQuery = DB::table('rooms')
                    ->select('general_price')               
                    ->where('room_id', '=', $_POST['room'])
                    ->first();

        $price = $datesPriceQuery->general_price;
    }

    return $price;
});*/

Route::post('datesPrices', function(){
    $price = 0;

    $arrDatesFromForm = array();
    $arrDatesFromDb = array();

    $datesPriceQuery = DB::table('rooms')
                    ->select('general_price')               
                    ->where('room_id', '=', $_POST['room'])
                    ->first();

    $priceGeneral = $datesPriceQuery->general_price;

    $arrayDatesFromForm=json_decode($_POST['dates']);

    foreach($arrayDatesFromForm as $arrayFromForm)
    {
        $arrDatesFromForm[$arrayFromForm] = $priceGeneral;
    }
    //var_dump($arrDates);

    $datesPriceQuery = DB::table('dates_prices')
                    ->select('date', 'price')
                    ->where('room_id', '=', $_POST['room'])
                    ->whereIn('date', $arrayDatesFromForm)                    
                    ->get();

    if($datesPriceQuery)
    {
        foreach($datesPriceQuery as $datePrice)
        {
            
            $arrDatesFromDb[$datePrice->date] = $datePrice->price;
            
        }
    }

    $arrResult = array_merge($arrDatesFromForm, $arrDatesFromDb);

    $html = "<div class='row'><div class='col-sm-12'><table class='table'>";

    //$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $sum = 0;
    foreach ($arrResult as $key => $value) {
        
        //$html .= date("F d, Y", strtotime($key))." $".$value." <br/>";
        $sum = $sum + $value;

        $arrDatesSingle = explode("-", $key);
        $html .= "<tr><td>".$arrDatesSingle[2]." de ".$meses[intval($arrDatesSingle[1]) - 1]." del ".$arrDatesSingle[0]."</td><td> $".$value." </td></tr>";
    }

    $suma = $sum * (int)$_POST['num_hab'];    

    $numHabitacionesText = ($_POST['num_hab'] > 1 ? "habitaciones" : "habitacion");

    $html .= "<tr><td><strong>Sub Total de reserva para ".$_POST['num_hab']." ".$numHabitacionesText." ".$_POST['hab']."</strong>:</td><td>$".$suma."<input type='hidden' class='totales' value='".$suma."'></td></tr></table></div></div>";

    return $html;
    //var_dump($arrResult);

    //var_dump($datesPriceQuery);
    //var_dump(DB::getQueryLog());

    /*if($datesPriceQuery)
    {
        $price = $datesPriceQuery->price;
        
    }else{
        $datesPriceQuery = DB::table('rooms')
                    ->select('general_price')               
                    ->where('room_id', '=', $_POST['room'])
                    ->first();

        $price = $datesPriceQuery->general_price;
    }*/

    //return $price;
});

Route::post('getBlockSelect', function(){
    $rooms = Room::all();

    $roomSelect = '<select name="room[]" id="room-'.$_POST['id'].'" class="form-control room">';
    foreach($rooms as $room)
    {
        $roomSelect .= '<option value="'.$room->room_id.'" >'.$room->name.'</option>';
    }

    $roomSelect .= '</select>';

    return $roomSelect;
});

Route::post('range_date_price', function(){

    function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
        }

        return $dates;
    }

    $datesRange = dateRange($_POST['from'], $_POST['to']);

    $html = null;
    foreach($datesRange as $dr)
    {
        
        $arDate = explode("/", $dr);
        $newDate = $arDate[2]."/".$arDate[1]."/".$arDate[0];

        $html .= '<tr><td><input type="text" class="form-control calendar" name="date[]" readonly value="'.$newDate.'"></td><td><input type="text" name="price[]" class="form-control" value="'.$_POST['price_general'].'" ></td><td><a href="#" class="btn btn-sm btn-danger delete">Eliminar</a></td></tr>';
    }

    echo $html;    

});



Route::post('range_date_block', function(){

    function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
        }

        return $dates;
    }

    $datesRange = dateRange($_POST['from'], $_POST['to']);

    $html = null;
    foreach($datesRange as $dr)
    {
        
        $arDate = explode("/", $dr);
        $newDate = $arDate[2]."/".$arDate[1]."/".$arDate[0];

        $html .= '<tr><td><input type="text" class="form-control calendar" name="date[]" readonly value="'.$newDate.'"></td><td><a href="#" class="btn btn-sm btn-danger delete">Eliminar</a></td></tr>';
    }

    echo $html;    

});





Route::get('denied', function(){
    return View::make('denied');
});

Route::get('admin', 'AdminWelcomeController@index');

Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');


Route::group(array('before' => 'auth'), function()
{


    Route::get('admin/changeSite/{id}', function($id){
        $country = Country::find($id);

        Session::put('country_id', $country->country_id);
        Session::put('country_tag', $country->name);

        return Redirect::to('admin/package');
    });


    Route::get('/elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::get('/elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');
    Route::get('/elfinder/standalonepopup/{input_id}/{multiple}', 'Barryvdh\Elfinder\ElfinderController@showPopup');

    Route::any('/elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');


    Route::get('elFinderSingle/{input_id}', array('as' => 'elFinderSingle', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderSingle'));
    Route::get('elFinderMultiple/{input_id}', array('as' => 'elFinderMultiple', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderMultiple'));
    Route::get('elFinderCkeditor4', array('as' => 'elFinderCkeditor4', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@elFinderCkeditor4'));

    Route::any('elfinderConnector', array('as' => 'elfinderConnector', 'uses' => 'Ferampe\Elfindercontrol\ElfindercontrolController@connector'));

    Route::get('admin/home/edit', array('as' => 'home_edit', 'uses' => 'AdminHomeController@edit'));
    Route::post('admin/home/update', array('before' => 'csrf', 'as' => 'home_update', 'uses' => 'AdminHomeController@update'));


    Route::get('admin/room', array('as' => 'room', 'uses' => 'RoomController@index'));
    Route::get('admin/room/create', array('as' => 'room_create', 'uses' => 'RoomController@create'));
    Route::post('admin/room/store', array('before' => 'csrf', 'as' => 'room_store', 'uses' => 'RoomController@store'));
    Route::get('admin/room/edit/{id}', array('as' => 'room_edit', 'uses' => 'RoomController@edit'));
    Route::post('admin/room/update', array( 'before' => 'csrf', 'as' => 'room_update', 'uses' => 'RoomController@update'));
    Route::get('admin/room/destroy/{id}', array('as' => 'room_destroy', 'uses' => 'RoomController@destroy'));

    Route::get('admin/date_price', array('as' => 'date_price', 'uses' => 'DatePriceController@index'));
    Route::get('admin/date_price/create', array('as' => 'date_price_create', 'uses' => 'DatePriceController@create'));
    Route::post('admin/date_price/store', array('before' => 'csrf', 'as' => 'date_price_store', 'uses' => 'DatePriceController@store'));
    Route::get('admin/date_price/edit', array('as' => 'date_price_edit', 'uses' => 'DatePriceController@edit'));
    Route::post('admin/date_price/update', array( 'before' => 'csrf', 'as' => 'date_price_update', 'uses' => 'DatePriceController@update'));
    Route::get('admin/date_price/destroy/{id}', array('as' => 'date_price_destroy', 'uses' => 'DatePriceController@destroy'));

    Route::post('admin/date_price/getDatesPrices', array('as' => 'getDatesPrices', 'uses' => 'DatePriceController@getDatesPrices'));
    
    
    Route::get('admin/date_block', array('as' => 'date_block', 'uses' => 'DateBlockController@index'));
    Route::get('admin/date_block/create', array('as' => 'date_block_create', 'uses' => 'DateBlockController@create'));
    Route::post('admin/date_block/store', array('before' => 'csrf', 'as' => 'date_block_store', 'uses' => 'DateBlockController@store'));
    Route::get('admin/date_block/edit', array('as' => 'date_block_edit', 'uses' => 'DateBlockController@edit'));
    Route::post('admin/date_block/update', array( 'before' => 'csrf', 'as' => 'date_block_update', 'uses' => 'DateBlockController@update'));
    Route::get('admin/date_block/destroy/{id}', array('as' => 'date_block_destroy', 'uses' => 'DateBlockController@destroy'));

    Route::post('admin/date_block/getDatesBlock', array('as' => 'getDatesBlock', 'uses' => 'DateBlockController@getDatesBlock'));


    Route::get('admin/config/edit/{id}', array('as' => 'config_edit', 'uses' => 'ConfigController@edit'));

    Route::post('admin/config/update', array('as' => 'config_update', 'uses' => 'ConfigController@update'));
});