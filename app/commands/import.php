<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class import extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'import';

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
		$this->info(' ******************* Iniciando Import Destinations ******************');
		$this->info('*********************************************************************');

		$destinationsOld = DB::connection('old')->table('destinations')->where('pk_destination', '!=', 0)->where('eliminado', '=', 0)->get();

		foreach ($destinationsOld as $d) {

			$destination = new Destination;
			$destination->destination_id = $d->pk_destination;
			$destination->country_id = 1;		
			$destination->name = $d->description;			
			$destination->publish = 1;
			$destination->save();

			$this->info($d->description);

		}

		$this->info('*********************************************************************');
		$this->info(' *********************** Iniciando Import Categories ****************');
		$this->info('*********************************************************************');

		/*$categories = DB::connection('old')->table('category_tourpackages')->join('tourpackages', 'category_tourpackages.pk_category_tourpackages', '=', 'tourpackages.fk_category_tourpackages')->groupby('category_tourpackages.category_description')->whereIn('tourpackages.pk_tourpackages', $arrPackages)->get();*/

		$categories = DB::connection('old')->table('category_tourpackages')->where('pk_category_tourpackages', '!=', 0)->get();

		foreach ($categories as $c) {

			$categoryPackage = new CategoryPackage;
			$categoryPackage->category_package_id = $c->pk_category_tourpackages;
			$categoryPackage->country_id = 1;
			$categoryPackage->name = $c->category_description;
			$categoryPackage->url = $c->ct_url;

			$categoryPackage->save();

			$this->info($c->category_description);
			
		}


		$this->info('*********************************************************************');
		$this->info('*********************** Iniciando Import Packages *******************');
		$this->info('*********************************************************************');

		$arrPackages = array();

		$tourpackages = DB::connection('old')->table('tourpackages')->where('eliminado', '=', 0)->where('deals', '=', 0)->get();

		foreach($tourpackages as $t)
		{

			if($t->fk_physical_difficulty){

				$this->info($t->title);

				$arrPackages[] = $t->pk_tourpackages;

				$package = new Package;
				$package->package_id = $t->pk_tourpackages;
				$package->country_id = 1;
				$package->title_seo = $t->head_title;
				$package->description_seo = $t->head_description;
				$package->keywords_seo = $t->head_keywords;
				$package->url = $t->url;
				$package->name = $t->title;
				$package->short_name = $t->short_title;
				$package->abstract = $t->resume_planner;
				$package->icon = $t->image_overview;
				$package->icon_alt = $t->alt;
				$package->overview = $t->overview;
				$package->included = $t->includes;
				$package->tag_days = $t->days;
				$package->tag_destinations = $t->subtitle_destinations;
				$package->physical_difficulty_id = $t->fk_physical_difficulty;
				$package->publish = 1;


				/************* Trabajar el tour higligh *******************/
				$subDestinationsTourpackages = DB::connection('old')->table('sub_detinations_tourpackages')->join('sub_destinations', 'sub_destinations.pk_sub_destinations', '=', 'sub_detinations_tourpackages.fk_sub_destinations')->where('fk_tourpackages', '=', $t->pk_tourpackages)->get();

				$fieldTourHigligh = NULL;

				foreach ($subDestinationsTourpackages as $sdt) {
					$fieldTourHigligh .= $sdt->description."\n";
					$this->info('-----'.$sdt->description);
				}
				/************* Fin trabajar el tour higligh *******************/

				$package->tour_highlights = $fieldTourHigligh;

				$package->save();

				$package->category()->attach($t->fk_category_tourpackages);

				$styles = explode(",", $t->tag_style);

				if(count($styles) > 1)
		        {
		            foreach ($styles as $tryp_style_id) {
		                $package->tripStyle()->attach($tryp_style_id);
		            }
		        }
			}
			
		}


		$this->info('*********************************************************************');
		$this->info(' *********************** Iniciando Import Itineraries ***************');
		$this->info('*********************************************************************');

		//$itinerary_old = ItineraryOld::all();
		$itinerary_old = DB::connection('old')->table('itineraries')
                    ->whereIn('fk_tourpackage', $arrPackages)->orderBy('fk_tourpackage', 'asc')->orderBy('day', 'asc')->get();

		//$cont = 0;
		foreach ($itinerary_old as $i) {
			//$cont++;
			
			$this->info($i->title);

			$itinerary = new Itinerary();
			$itinerary->package_id = $i->fk_tourpackage;
			$itinerary->day = $i->day;
			$itinerary->day_join = $i->day_join;
			$itinerary->name = $i->title;
			$itinerary->content = $i->content;
			$itinerary->image = $i->image;
			$itinerary->image_alt = $i->alt_img;
			$itinerary->image_title = $i->title_image;
			$itinerary->url_gallery = $i->galeria;
			//$itinerary->order = $cont;
			$itinerary->publish = 1;

			$itinerary->save();
		}
		

		$this->info('*********************************************************************');
		$this->info(' *********************** Iniciando Import Additional ****************');
		$this->info('*********************************************************************');

		$additionalHead = DB::connection('old')->table('additional_head')->get();

		foreach ($additionalHead as $a) {

			$additional = new Additional;
			$additional->additional_id = $a->pk_additional_head;
			$additional->country_id = 1;
			$additional->name = $a->additional_title;
			$additional->anchor = $a->ancla;
			$additional->publish = 1;
			$additional->save();

			$this->info($a->additional_title);
			# code...
		}

		$this->info('*********************************************************************');
		$this->info(' ***************** Iniciando Import Additional Items ****************');
		$this->info('*********************************************************************');

		$additionalItemsOld = DB::connection('old')->table('additional')->where('estado', '=', 0)->get();

		foreach ($additionalItemsOld as $ai) {

			$additionalItem = new AdditionalItem;
			$additionalItem->additional_items_id = $ai->pk_additional;
			$additionalItem->additional_id = $ai->fk_additional_head;
			$additionalItem->title = $ai->title;
			$additionalItem->content = $ai->content;		
			$additionalItem->publish = 1;
			$additionalItem->save();

			$this->info($ai->title);
			# code...
		}

		$this->info('*********************************************************************');
		$this->info(' ***************** Iniciando Relacion Additional y Packages**********');
		$this->info('*********************************************************************');

		$relacionAdditionalPackages = DB::connection('old')->table('additional_tourpackages')->whereIn('fk_tourpackages', $arrPackages)->get();

		foreach ($relacionAdditionalPackages as $rel) {

			DB::table('additional_packages')->insert(array(
				'additional_id' => $rel->fk_additional_head,
				'package_id' => $rel->fk_tourpackages
				));

			$this->info($rel->fk_additional_head." ==== ". $rel->fk_tourpackages);
			
		}

		$this->info('*********************************************************************');
		$this->info(' ***************** Iniciando Relacion Destination y Packages**********');
		$this->info('*********************************************************************');

		$relacionDestinationsPackages = DB::connection('old')->table('destinations_tourpackages')->whereIn('fk_tourpackages', $arrPackages)->where('fk_destination', '!=', 0)->get();

		foreach ($relacionDestinationsPackages as $rel) {

			DB::table('destinations_packages')->insert(array(
				'package_id' => $rel->fk_tourpackages,
				'destination_id' => $rel->fk_destination
				));

			$this->info($rel->fk_tourpackages." ==== ". $rel->fk_destination);
			
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
