<?php

class ConfigController extends \BaseController {

    protected $menu = 'config';
    protected $validationRules = array('terms_and_conditions' => 'required|min:3');





	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$config = Confige::find($id);
        
        $data = array('config' => $config, 'menu' => $this->menu);

        return View::make('backend/config', $data);


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
            return Redirect::to('admin/config/edit/'.Input::get('config_id'))->withErrors($validation)->withInput();
        }else{
            $config = Confige::find(Input::get('config_id'));

            $config->terms_and_conditions = Input::get('terms_and_conditions');            

            $config->save();

            return Redirect::to('admin/config/edit/'.Input::get('config_id'))->with('success', 'Trip Style Updated.');
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
