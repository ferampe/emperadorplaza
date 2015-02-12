<?php


Class FieldHtml{


  public static function textAreaCkeditorItinerary($name, $value, $label, $attributes = array())
  {

      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_itinerary', $data);
  }

  public static function textAreaCkeditorHotel($name, $value, $label, $attributes = array())
  {

      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_hotel', $data);
  }

  public static function textAreaCkeditorTabDestination($name, $value, $label, $attributes = array())
  {

      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_tab_destination', $data);
  }

    public static function textAreaCkeditorTabTemplateDestination($name, $value, $label, $attributes = array())
  {

      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_destination_tab_template', $data);
  }




  

  public static function textAreaCkeditorTravelGuide($name, $value, $label, $attributes = array())
  {

      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_travel_guide', $data);
  }

  public static function textAreaCkeditorPrice($name, $value, $label, $attributes = array())
  {
      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor_price', $data);
  }


  public static function textAreaCkeditor($name, $value, $label, $attributes = array())
  {
      $height = (isset($attributes['rows']) ? $attributes['rows'] : NULL);
      $data = compact('name', 'value', 'label', 'attributes', 'height');

      return View::make('backend/libraries/text_area_ckeditor', $data);
  }


  public static function selectDestination($inputName, $value = 0, $attributes = array())
  {

    $destinations = Destination::where('country_id', '=', Session::get('country_id'))->where('removed', '=', 0)->get(array('name', 'destination_id'));

    $arrDestinations = array( '' => 'Select Destination');
    foreach ($destinations as $destination) {
      $arrDestinations[$destination->destination_id] = $destination->name;
    }

    $inputSelect = Form::label($inputName, 'Destination:&nbsp;');
    $inputSelect .= Form::select($inputName, $arrDestinations, $value, $attributes);

    return $inputSelect;

  }

  public static function selectDestinationForHotel($inputName, $value = 0, $attributes = array())
  {

    $destinations = DestinationForHotel::where('removed', '=', 0)->orderBy('name', 'asc')->get(array('name', 'destination_for_hotel_id'));

    $arrDestinations = array( '' => 'Select Destination for Hotel');
    foreach ($destinations as $destination) {
      $arrDestinations[$destination->destination_for_hotel_id] = $destination->name;
    }

    $inputSelect = Form::label($inputName, 'Destination for hotel:&nbsp;');
    $inputSelect .= Form::select($inputName, $arrDestinations, $value, $attributes);

    return $inputSelect;

  }

    /*public static function selectCategory($inputName, $value = 0, $attributes = array())
    {

        $category = CategoryPackage::where('country_id', '=', Session::get('country_id'))->where('removed', '=', 0)->get(array('name', 'category_package_id'));

        $arrDestinations = array( '' => 'Select Category Package');
        foreach ($category as $cat) {
            $arrDestinations[$cat->category_package_id] = $cat->name;
        }

        $inputSelect = Form::label($inputName, 'Category Package:&nbsp;');
        $inputSelect .= Form::select($inputName, $arrDestinations, $value, $attributes);

        return $inputSelect;

    }*/

    public static function selectCategory($inputName = 'category', $values = NULL, $attributes = array())
    {

        $category = CategoryPackage::where('country_id', '=', Session::get('country_id'))->where('removed', '=', 0)->lists('name', 'category_package_id');

        $inputSelect = Form::label($inputName);
        $inputSelect .= HelpText::getPopover('category_package_name');
        $inputSelect .= Form::select($inputName, $category, $values, $attributes);
        return $inputSelect;

    }

    public static function selectDestinationGroup($inputName = 'destinations', $label = "Destinations", $values = NULL, $attributes = array())
  {

      $arrSelect = array();

      $countries = Country::all();

      foreach ($countries as $country) {

          $destinations = Destination::where('country_id', '=', $country->country_id)->where('removed', '=', 0)->get();

          $arrDestinations = NULL;
          foreach ($destinations as $destination) {
              $arrDestinations[$destination->destination_id] = $destination->name;
          }

          if ($arrDestinations) {
              $arrSelect[$country->name] = $arrDestinations;
          }

      }

      $inputSelect = Form::label($inputName, $label.':&nbsp;');
      $inputSelect .= Form::select($inputName, $arrSelect, $values, $attributes);

      return $inputSelect;
  }

    public static function selectDestinationHotelGroup($inputName = 'destinations', $label = "Destinations", $values = NULL, $attributes = array())
    {

        $arrSelect = array();

        $countries = Country::all();

        foreach ($countries as $country) {

            $destinations = DB::table('destinations_for_hotels')
                            ->join('hotels', 'destinations_for_hotels.destination_for_hotel_id', '=', 'hotels.destination_for_hotel_id')
                            ->where('destinations_for_hotels.country_id', '=', $country->country_id)
                            ->where('destinations_for_hotels.removed', '=', 0)
                            ->where('hotels.top_pick', '=', 1)
                            ->select('destinations_for_hotels.name', 'destinations_for_hotels.destination_for_hotel_id')
                            ->get();

            $arrDestinations = NULL;
            foreach ($destinations as $destination) {
                $arrDestinations[$destination->destination_for_hotel_id] = $destination->name;
            }

            if($arrDestinations)
            {
                $arrSelect[$country->name] = $arrDestinations;
            }

        }


        $inputSelect = Form::label($inputName, $label.':&nbsp;');
        $inputSelect .= HelpText::getPopover("select_destinations_hotel");
        $inputSelect .= Form::select($inputName, $arrSelect, $values, $attributes);

        return $inputSelect;
    }



    public static function selectServicesFacilities($inputName, $values = array(), $attributes = array())
    {

        $servicesFacilities = ServicesFacilities::where('removed', '=', 0)->lists('name', 'services_facilities_id');

        $inputSelect = Form::label($inputName, 'Service Facilities:&nbsp;');
        $inputSelect .= Form::select($inputName, $servicesFacilities, $values, $attributes);
        return $inputSelect;

    }



    public static function selectAdditionalGroup($inputName = 'additional', $values = NULL, $attributes = array())
  {

    $arrSelect = NULL;

    $countries = Country::all();

    foreach ($countries as $country) {

        $additionals = Additional::where('country_id', '=', $country->country_id)->where('removed', '=', 0)->get();
        $arrAdditional = NULL;
        foreach ($additionals as $additional) {
            $arrAdditional[$additional->additional_id] = $additional->name;
        }

        if($arrAdditional)
        {
          $arrSelect[$country->name] = $arrAdditional;
        }

    }

      if($arrSelect == NULL)
          return NULL;


    $inputSelect = Form::label($inputName, 'Additional:&nbsp;');
    $inputSelect .= HelpText::getPopover('additional');
    $inputSelect .= Form::select($inputName, $arrSelect, $values, $attributes);

    return $inputSelect;

  }


  public static function selectTripStyle($inputName = 'trip_style', $values = NULL, $attributes = array())
  {

    $tripStyle = TripStyle::all()->lists('name', 'trip_style_id');

    $inputSelect = Form::label($inputName, 'Trip Style:');
    $inputSelect .= Form::select($inputName, $tripStyle, $values, $attributes);
    return $inputSelect;

  }

  public static function selectPhysicalDifficulty($inputName = 'physical_difficulty_id', $values = NULL, $attributes = array())
  {

    $physicalDifficulty = PhysicalDifficulty::all()->lists('name', 'physical_difficulty_id');

    $inputSelect = Form::label($inputName, 'Physical Difficulty:&nbsp;');
    $inputSelect .= Form::select($inputName, $physicalDifficulty, $values, $attributes);

    return $inputSelect;

  }


  public static function selectPublish($value = NULL, $attributes = array())
  {

    $inputSelect = Form::label('publish','Publish');
    $inputSelect .= HelpText::getPopover("publish");
    $inputSelect .= Form::select('publish', array('1' => 'Yes', '0' => 'No'), $value, $attributes);

    return $inputSelect;
  }

  public static function selectPackageHome($value = NULL, $attributes = array())
  {

    $inputSelect = Form::label('home', 'Appears in the home');
    
    $inputSelect .= Form::select('home', array('1' => 'Yes', '0' => 'No'), $value, $attributes);

    return $inputSelect;
  }

  public static function selectTabDestination($value = NULL, $attributes = array())
  {

    $inputSelect = Form::label('tab_bloque', 'Bloque:');
    $inputSelect .= Form::select('tab_bloque', array('1' => 'Inside', '2' => 'About'), $value, $attributes);

    return $inputSelect;
  }

  public static function selectTabHome($value = NULL, $attributes = array())
  {

    $inputSelect = Form::label('tab_section', 'Section:');
    $inputSelect .= Form::select('tab_section', array('1' => 'Section 1', '2' => 'More For Less', '3' => 'About Peru'), $value, $attributes);

    return $inputSelect;
  }

    public static function selectStar($value = 0, $attributes = array())
    {
      $grade = DB::table('grade_hotel')->get(array('grade_name', 'grade_hotel_id'));
      $arrGrade = array( '' => 'Select Grade');
      foreach ($grade as $g) {
        $arrGrade[$g->grade_hotel_id] = $g->grade_name;
      }

      $inputSelect = Form::label('star', 'Select Grade:&nbsp;');
      $inputSelect .= HelpText::getPopover("grade");
      $inputSelect .= Form::select('star', $arrGrade, $value, $attributes);

      return $inputSelect;

        /*$grade = DB::table('grade_hotel')->lists('grade_name', 'grade_hotel_id');

        $inputSelect = Form::label('star', 'Select Grade:&nbsp;');
        $inputSelect .= Form::select('star', $grade, $value, $attributes);

        return $inputSelect;*/
    }

    public static function selectTopPick($value = NULL, $attributes = array())
    {

        $inputSelect = Form::label('top_pick','Top Pick:');
        $inputSelect .= HelpText::getPopover("top_pick");
        $inputSelect .= Form::select('top_pick', array('1' => 'Yes', '0' => 'No'), $value, $attributes);

        return $inputSelect;
    }


  public static function buttonWithInputTextSelectOnlyOneImage($idInput, $label, $value = '', $attributes = '')
  {

    $data = compact('idInput', 'label', 'value', 'attributes');
    return View::make('backend/libraries/library_control_html_button_with_input_text_select_only_one_image', $data);
  }


  public static function buttonGallery($idInput, $images = null)
  {

    $data = compact('idInput', 'images');
    return View::make('backend/libraries/library_control_html_button_gallery', $data);

  }


}
