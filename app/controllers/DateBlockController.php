<?php

class DateBlockController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datesBlock = DateBlock::all();

		return View::make('date_block', compact('datesBlock'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('date_block_create');
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
		//$date_block = DateBlock::find($id);
		$rooms = Room::all();
		$data = array('rooms' => $rooms);
		return View::make('backend/date_block_edit', $data);
	}

	public function getDatesBlock()
	{
		$datesBlock = DateBlock::where('room_id', '=', Input::get('room'))->where('date', '>=', date('Y-m-d'))->get();

		return Response::json($datesBlock);

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

		DateBlock::where('room_id', '=', Input::get('room'))->where('date', '>=', date('Y-m-d'))->delete();

		//var_dump(DB::getQueryLog());

		foreach (Input::get('date') as $key => $value){

			$dateF = explode('/', Input::get('date.'.$key));

			$formatDate = $dateF[2]."-".$dateF[1]."-".$dateF[0];

			$datePrice = new DateBlock;

			$datePrice->date = $formatDate;
			$datePrice->room_id = Input::get('room');		

			$datePrice->save();
			
		}


		return Redirect::action('DateBlockController@edit', array('room' => Input::get('room'), 'success' => 'Fechas Bloqueadas.'));
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
