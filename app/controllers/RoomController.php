<?php

class RoomController extends \BaseController {

    protected $menu = 'room';
    protected $validationRules = array('name' => 'required|min:3');

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$rooms = Room::all();

        $data = array('rooms' => $rooms, 'menu' => $this->menu);

        return View::make('backend/room', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$data = array('menu' => $this->menu);

        return View::make('backend/room_create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $validation = Validator::make(Input::all(), $this->validationRules);

        if($validation->fails())
        {
            return Redirect::to('admin/room/create')->withErrors($validation)->withInput();
        }else{
            $room = new Room();

            $room->name = strip_tags(Input::get('name'));
            $room->description = Input::get('description');
            $room->general_price = Input::get('general_price');

            $room->save();

            $room_id = DB::getPdo()->lastInsertId();

            return Redirect::to('admin/room/edit/'.$room_id)->with('success', 'Trip Style Stored.');
        }

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
	public function edit($id)
	{

		$room = Room::find($id);
        
        $data = array('room' => $room, 'menu' => $this->menu);

        return View::make('backend/room_edit', $data);


	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $validation = Validator::make(Input::all(), $this->validationRules);

        if($validation->fails())
        {
            return Redirect::to('admin/room/edit/'.Input::get('room_id'))->withErrors($validation)->withInput();
        }else{
            $room = Room::find(Input::get('room_id'));

            $room->name = strip_tags(Input::get('name'));
            $room->description = Input::get('description');
            $room->general_price = Input::get('general_price');

            $room->save();

            return Redirect::to('admin/room/edit/'.Input::get('room_id'))->with('success', 'Trip Style Updated.');
        }


        //return Redirect::to('admin/room')->with('success', 'Destination Update.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$room = Room::find($id);        

        $room->removed = 1;
        $room->save();

        return Redirect::to('admin/room');
	}





}
