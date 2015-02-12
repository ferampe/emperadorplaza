<?php

class DatePriceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datesPrices = DatePrice::all();

		return View::make('date_price', compact('datesPrices'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('date_price_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		//$date_price = DatePrice::find($id);
		$rooms = Room::all();
		$data = array('rooms' => $rooms);
		return View::make('backend/date_price_edit', $data);
	}

	public function getDatesPrices()
	{
		$datesPrices = DatePrice::where('room_id', '=', Input::get('room'))->where('date', '>=', date('Y-m-d'))->get();

		return Response::json($datesPrices);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		//var_dump(Input::all());

		DatePrice::where('room_id', '=', Input::get('room'))->where('date', '>=', date('Y-m-d'))->delete();

		//var_dump(DB::getQueryLog());

		foreach (Input::get('date') as $key => $value){

			$dateF = explode('/', Input::get('date.'.$key));

			$formatDate = $dateF[2]."-".$dateF[1]."-".$dateF[0];

			$datePrice = new DatePrice;

			$datePrice->date = $formatDate;
			$datePrice->price = Input::get('price.'.$key);
			$datePrice->room_id = Input::get('room');		

			$datePrice->save();
			
		}

		//return Redirect::to('admin/date_price/edit')->with('success', 'Precios Actualizados.');

		return Redirect::action('DatePriceController@edit', array('room' => Input::get('room'), 'success' => 'Precios Actualizados.'));

		/*$date = DatePrice::find(Input::get('id'));

		$date->name = Input::get('name');
		$date->save();

				

		return Redirect::to('date_price')*/; 
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
