<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class clearRolesPermission extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:clearRolesPermission';

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
		DB::table('assigned_roles')->delete();
		$this->info('assigned_roles OK');
		DB::table('permissions')->delete();		
		$this->info('permissions OK');
		DB::table('roles')->delete();		
		$this->info('roles OK');

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
