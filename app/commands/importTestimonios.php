<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class importTestimonios extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'importTestimonio';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
		$this->info('*********************************************************************');
		$this->info(' ******************* Iniciando Import Itineraries *******************');
		$this->info('*********************************************************************');

		$testimonioOld = DB::connection('old')->table('testimonios')->get();

		foreach ($testimonioOld as $t) {

			$testimonio = new Testimonio;
			$testimonio->testimonio_id = $t->idtes;
			$testimonio->country_id = 1;		
			$testimonio->title = $t->mensaje;
			$testimonio->content = $t->contenido;
			$testimonio->signature = $t->firma;
			$testimonio->image = $t->foto_chico;
			$testimonio->image_alt = $t->alt_imagen;
			$testimonio->order = $t->num_orden;
			$testimonio->publish = 1;
			$testimonio->removed = 0;
			$testimonio->save();

			$this->info($t->mensaje);

		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
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
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
