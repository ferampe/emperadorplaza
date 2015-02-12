<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class clearDB extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'clearDB';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Elimina tablas, packages, itineraries, additional, additional_items, destinations, sub-destinations, category.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		DB::table('hotels')->where('removed', '=', 1)->delete();
		$this->info('Hotel Table clear Ok');

		DB::table('destinations_for_hotels')->where('removed', '=', 1)->delete();		
		$this->info('Destinations Table clear OK');

		DB::table('additional')->where('removed', '=', 1)->delete();		
		$this->info('Additional Table clear OK');

		DB::table('packages')->where('removed', '=', 1)->delete();		
		$this->info('Package Table clear OK');
		
		DB::table('destinations')->where('removed', '=', 1)->delete();		
		$this->info('DEstinations Table clear OK');
		


	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			
		);
	}

}
