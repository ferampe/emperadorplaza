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

    $query = DB::select("SELECT DATE_FORMAT(date, '%d/%m/%Y') as date_blok FROM dates_block WHERE date >= date('Y-m-d')");

    $datesBlock = DB::table('dates_block')
                     ->select(DB::raw('DATE_FORMAT(date, "%d/%m/%Y")'))
                     ->where('date', '>=', date('Y-m-d'))                     
                     ->get();

    //$datesBlock = DateBlock::where('date', '>=', date('Y-m-d'))->get(array('DATE_FORMAT(date, "%d/%m/%Y")'))->toArray(array('date'));
    //$datesBlock = DB::select(DB::raw($query));

    dd($datesBlock);

    return View::make('form_reservation');
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