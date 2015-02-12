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

  
    //echo "<pre>";
    //dd($datesBlockArr);
    //
    $datos = array('roomSelect' => $roomSelect, 'rooms' => $rooms, 'datesBlocks' => $datesBlockArr, 'datesPrices' => $datesPriceArr);

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

Route::post('getBlockSelect', function(){
    $rooms = Room::all();

    $roomSelect = '<select name="room[]" id="room-'.$_POST['id'].'" class="form-control">';
    foreach($rooms as $room)
    {
        $roomSelect .= '<option value="'.$room->room_id.'" >'.$room->name.'</option>';
    }

    $roomSelect .= '</select>';

    return $roomSelect;
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
});