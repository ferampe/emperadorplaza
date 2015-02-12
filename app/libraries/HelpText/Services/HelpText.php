<?php
namespace libraries\HelpText\Services;

class HelpText{

  public function getPlaceholder($key) {
    return $this->placeholders[$key];
  }

  private function getTitle($name) {
    $title = strtr($name, "_", " ");
    $title = ucwords($title);
    return $title;
  }

  public function getPopover($name, $context = "") {
    $content = $this->popovers[$name];

    if ($context != ""){
      $example = $this->placeholders[$context . "_" . $name];
    }
    elseif (isset($this->placeholders[$name])) {
      $example = $this->placeholders[$name];
    }
    else {
      $example = "";
    }

    $title = $this->getTitle($name);
    return "<a
    name='$name'
    href='#'
    class='glyphicon glyphicon-info-sign'
    data-toggle='popover'
    data-trigger='focus'
    data-html='false' 
    title='$title'
    data-content='$content<br>$example'
    ></a>";
  }

  private $placeholders = array(
    "package_name"=>"e.g. <em>Special #1 Heart of the Inca</em>",
    "package_short_name"=>"e.g. <em>Heart of the Inca</em>",
    "tag_destinations"=>"e.g. <em>Lima, Cusco, Machu Picchu</em>",
    "abstract"=>'e.g.<br><em>"Travel up to the top of world wonder Machu Picchu and learn about the fascinating Inca history in their ancient capital Cusco, with this inclusive Peru travel package"</em>.',
    "overview"=>"e.g. <em>If you’ve always wanted to go to Machu Picchu, this Peru package is for you…</em>",
    "price"=>"",
    "included"=>"<strong>INCLUDED:</strong>
    <ul>
    <li>1 night in Lima airport hotel, 3 nights in Cusco and 1 night in the Sacred Valley in Peru, Hotels based on US standards</li>
    <li>All tours stated in the itinerary with English-speaking guides</li>
    <li>Ground transportation and entrance fees</li>
    </ul>

    <strong>NOT INCLUDED:</strong>
    <ul>
    <li>Airfare</li>
    <li>Lunches or dinner (unless otherwise specified)</li>
    <li>Airport taxes</li>
    </ul>",

    "package_seo_title"=>"e.g.: <em>Peru Packages: Heart of the Inca</em>",
    "seo_description"=>
    "e.g. <em>Immerse yourself in the magical culture of the Incas with a trip to Cusco and visit World Wonder Machu Picchu, with our experts at Peru For Less.</em>",
    "seo_keywords"=>'e.g. <em>"Cusco tours, cusco travel, machu picchu tours, machu picchu travel, peru travel, peru vacations, peru travel packages, machu picchu vacations</em>"',
    "destinations"=>"e.g. <em>Cusco, Lima, Sacred Valley</em>",
    "tour_highlights"=>"e.g.: <em>Machu Picchu, Sacred Valley, Cusco Tour</em>",
    "category_package"=>"e.g. <em>Deals, Amazon Tours</em>",
    "trip_style"=>"-",
    "physical_difficulty"=>"-",
    "additional"=>"e.g. <em>Additional Services in Cusco</em>",
    "icon"=>"e.g. <em>img/i-lima-main-square3.jpg</em>",
    "icon_title"=>
    "e.g. <em>The Peruvian capital of Lima seamlessly combines the modern with the colonial. Explore its highlights
    in this photo gallery.</em>",
    "icon_alt"=>"e.g. <em>The main square in Lima's historic center seen as part of a Peru for Less city tour</em>",
    "image_header"=>"e.g. <em>img/i-lima-main-square3.jpg</em>",
    "image_header_title"=>"",
    "image_header_alt"=>"e.g. <em>The main square in Lima's historic center seen as part of a Peru for Less city tour</em>",
    "select_destinations_hotel"=>"",
    "itinerary_name"=>"e.g. <em>Arrival in Cusco</em>",
    "day"=>"e.g. <em>2</em>",
    "day_join"=>"e.g. <em>5</em>",
    "content"=>"e.g. <em>Your morning flight to Cusco will land at 11,150 feet or 3,400 meters of elevation. Be sure to...</em>",
    "image_itinerary"=>"e.g. <em>img/i-lima-main-square3.jpg</em>",
    "alt_icon"=>
    "e.g. <em>The main square in Lima's historic center seen as part of a Peru for Less city tour</em>",
    "destination"=>"",

    // Hotel Section
    "hotel_seo_title"=>'e.g. <em>"Aranwa Cusco Boutique Hotel Info & Photos | Cusco Hotels | Peru For Less</em>"',
    "hotel_seo_description"=>
    'e.g. <em>"Stay at a the high quality Aranwa Cusco hotel on your Peruvian adventure organized by the value-oriented team of travel experts at Peru For Less"</em>.',
    "hotel_seo_keywords" =>
    'e.g. <em>"Cusco hotels, Cusco accommodations, Aranwa Cusco Boutique Hotel, Peru travel, Peru tours, Peru vacations</em>"',
    "hotel_name"=>
    "e.g. <em>Boutique Hotel Casa San Blas</em>",
    "hotel_address"=>
    "e.g. <em>Tocuyeros 566, San Blas, Cusco</em>",
    "hotel_abstract"=>
    "e.g. <em>Discover the colonial treasures of Arequipa, most beautiful city in Peru, and travel to the dizzying Colca Canyon to admire its thousand years old agricultural terraces and flying Condors.</em>",
    "internal_content"=>
    "e.g. <em>Located only 2 blocks from Plaza de Armas and adjacent to Plaza San Francisco, the Aranwa Cusco Boutique...</em>",
    "hotel_url"=>
    "e.g. <em>hotels-cusco-aranwa-boutique</em>",
    "icon"=>"e.g. <em>img/icon-aranwa.jpg</em>",
    "title_icon"=>
    "e.g. <em>Click to see a gallery of images of Lima, as seen from a Peru for Less city tour</em>",
    "package_url"=>"e.g. <em>special1-heart-of-the-inca</em>",
    "service_facilities"=>"",
    "top_pick"=>"",
    "title"=>"",
    "alt"=>"e.g. <em>img/icon-aranwa.jpg</em>",

    // Destinations
    "destination_url"=>
    "e.g. <em>destinations-peru-machu-picchu</em>",
    "destination_name"=>'.e.g. "<em>Machu Picchu</em>" or "<em>Lima</em>"',
    "additional_name"=>'e.g. <em>"Additional Services in Cusco"</em>',
    "additional_anchor"=>"",
    "destination_seo_title" =>
    'e.g. <em>"Peru Attractions & Destinations | Customized Peru Tours with Peru For Less</em>"',
    "destination_seo_keywords" =>
    'e.g. <em>"Peru travel, Peru tours, Peru vacations, Cusco tours, Machu Picchu tours, Amazon tours, Nazca lines tours, Lima tours</em>"',
    "destination_seo_description" =>
    'e.g. <em>"Looking for great places to visit in Peru? Check our guides to travel destinations in Peru and start planning an adventure</em>"',

    // Destination Hotel
    "destination_hotel_seo_title"=>
    'e.g. <em>"Peru Hotels: Cusco Hotels | Peru Vacations by Peru For Less</em>"',
    "destination_hotel_seo_description"=>
    'e.g." <em>Explore the seat of the Inca Empire and stay in one of our recommended Cusco hotels, selected for their excellent service by experts at Peru For Less</em>"',
    "destination_hotel_seo_keywords"=>
    'e.g. "<em>Cusco hotels, Cusco accommodations, Peru hotels, Cusco tours, Peru travel, Peru tours, Peru vacations, Peru accommodations, Peru travel packages</em>"',

    // Category Package

    "category_package_name"=>
    'e.g. <em>"Deals</em>" or "<em>Amazon Tours</em>"',
    "description"=>"",
    "category_package_url" =>
    "",
    "category_package_seo_title" =>
    'e.g. "<em>Amazon Tours | Customized Peru Travel with Peru For Less</em>"',

    "category_package_seo_description" =>
    'e.g. "<em>Itching to explore the Amazon rainforest? Browse our wide variety of customizable Amazon Tours</em>"',

    "category_package_seo_keywords" =>
    'e.g. "<em>Peru tours, Peru packages, Peru tour packages, Peru travel, Peru vacations, Peru travel packages, Amazon travel, Amazon tours, Amazon vacations</em>"',

    // Travel Guide
    "travel_guide_name"=>
    "e.g. <em>Lima Travel Guide, Paracas Travel Guide.</em> etc",
    "travel_guide_url"=>
    "e.g. <em>lima-travel-guide</em>",
    "content"=>"",
    "title"=>"",
    "content"=>"",
    "signature"=>"",
    "image"=>"",
    "title_image"=>"",
    "physical_difficulty_name"=>"",
    "trip_style_name"=>"",

    // Staff Section
    "staff_name"                     =>
    "Fernando Ramos",
    "email"                     =>
    'fernando@latinamericaforless.com',
    "charge"                     =>
    'e.g. <em>Sales Manager</em>',

    "staff_icon_alt"           => 'e.g. "<em>Photo of Fernando Ramos</em>"',
    "staff_icon_title"           => 'e.g. "<em>More information about Fernando Ramos</em>"'
  );

  private $popovers = array(
    // Package Section
    "package_name"=>"The complete name of the package as it will appear in the package description",
    "package_short_name"=>"A slightly abbreviated name of the package which will appear in internal search results.",
    "tag_destinations"=>"List of destinations visited during the package, separated by commas.",
    "abstract"             => 'An abbreviated description of the package which will appear in internal search results like the trip planner',
    "overview"                  =>
    'Use this editor to  create a general description of the package. If you need to copy and paste from somewhere else be
    sure to remove the formatting from that text by clicking on the "Tx" button',
    "price"                     =>
    'Click on one of the [img of template icon] to select the appropriate pricing template.
    Fill in all prices in U.S. dollars without any currency symbols for the different numbers of stars. The
    other currencies will be calculated automatically.',
    "included"                  =>
    'Should delineate services that are <em>and are not</em> included in the price of the tour, in order to properly set client expectations. Should be in the following format:',
    "package_url"                       =>
    'For package the url should just be the name of the package broken up by dashes and without special
    characters. Special characters will automatically be removed here and spaces converted to dashes. More info
    on good URLs for SEO <a href="http://webdesign.tutsplus.com/articles/seo-friendly-url-structure--webdesign-9569" target="_blank">here</a>.',
    "seo_title"                 =>
    'The title is an html tag that appears as the name of the tab in the browser as well as its name in google
    search results. More information <a href="http://moz.com/learn/seo/title-tag" target="_blank">here</a>.',
    "seo_description"           =>
    'This is the information that appears beneath the title in google search results. The Meta description
    should not be longer than 160 characters. More information <a href="http://moz.com/learn/seo/meta-
    description" target="_blank">here</a>.',
    "seo_keywords"              =>
    'The keywords meta tag is where you can specify keywords you’re particularly interested in bringing visitors
    to the site.',
    "publish"                   =>
    'Toggles whether or not this item will be displayed on the public site when saved. Select "No" if the item is unavailable or unready to appear on the public site.',
    "destinations"              =>
    '',
    "tour_highlights"           =>
    'The trips key locations or activities',
    "category_package"          =>
    'Choose from existing package categories, created in the corresponding section. Used to group together similar packages as well as to populate the "Deals" page.',
    "trip_style"                =>
    '-',
    "physical_difficulty"       =>
    '-',
    "additional"                =>
    'These are optional services not included in the itinerary or price of the package. They are created in the “Additional" section and grouped together by destination, e.g. Additional Services in Cusco',
    "icon"                      =>
    'This is the image that will represent the package across all our pages. After you upload the image you’ll see the file name appear. The file name that you give to this image is important and should be descriptive. You can edit the file name within the finder window that appears. See this article for more information about optimizing images for SEO <a href="http://webdesign.tutsplus.com/articles/optimizing-images-for-seo--webdesign-9949" target="_blank">this article</a>',
    "icon_title"                =>
    'Depending on the browser this title may show up as a tool tip when you hover over with the mouse and is often attached to the link to tell where the link goes. Additional information on how to use image titles versus alt text <a href="http://www.webnetism.com/shouts/image-alt-tags-and-title-tags-for-seo.aspx" target="_blank">here</a>',
    "icon_alt"                  =>
    'Alt stands for alternative text; it’s the text that takes the place of images when unavailable or indexed by a search engine. They’re extremely important for SEO. You can find more detailed information on writing alt-text <a href="http://www.digitalsherpa.com/blog/write-seo-friendly-alt-text-images/" target="_blank">here</a>. The Alt text shouldn’t be more than about 16 words long (see <a href="http://www.hobo-web.co.uk/how-many-words-in-alt-text-for-google-yahoo-bing/" target="blank">this link</a>)',
      "image_header"              =>
      'This is the larger image that appears at the top of the page. After you upload the image you’ll see the file name appear. The file name that you give to this image is important and should be descriptive. You can edit the file name within the finder window that appears. See this article for more information about optimizing images for SEO <a href="http://webdesign.tutsplus.com/articles/optimizing-images-for-seo--webdesign-9949" target="_blank">this article</a>',
    "image_header_title"        =>
    'Depending on the browser this title may show up as a tool tip when you hover over with the mouse and is
    often attached to the link to tell where the link goes. Additional information on how to use image titles
    versus alt text <a href="http://www.webnetism.com/shouts/image-alt-tags-and-title-tags-for-seo.aspx" target="_blank">here</a>',
      "image_header_alt"          =>
      'Alt stands for alternative text; it’s the text that takes the place of images when unavailable or indexed by a search engine. They’re extremely important for SEO. You can find more detailed information on writing alt-text <a href="http://www.digitalsherpa.com/blog/write-seo-friendly-alt-text-images/" target="_blank">here</a>. The Alt text shouldn’t be more than about 16 words long (see <a href="http://www.hobo-web.co.uk/how-many-words-in-alt-text-for-google-yahoo-bing/" target="blank">this link</a>)',
    "select_destinations_hotel" =>
        '',
    "itinerary_name"            =>
        'A simple description of the main activity of that day of the trip',
    "day"                       =>
        'The number of the day',
    "day_join"                  =>
        'If a particular leg of the journey takes multiple days, then the day that the trip ends should go here. For instance you might have a cruise portion of the trip that started on day 2 and ended on day 5, "5" would go here.',
    "content"                   =>
        '',
    "image_itinerary"           =>
        'This image should represent that day in the itinerary in some way as it will be displayed next to that
        day in the itinerary. <br>
        After you upload the image you’ll see the file name appear. The file name
        give to this image is important and should be descriptive. You can edit the file name within the finder
        window that appears. See <a href="http://webdesign.tutsplus.com/articles/optimizing-images-for-seo--webdesign-9949" target="_blank">this article</a> for more information about optimizing images for SEO',
    "destination"               =>
        'Depending on the browser this title may show up as a tool tip when you hover over with the mouse and is often attached to the link to tell where the link goes. Additional information on how to use image titles versus alt text <a href="http://www.webnetism.com/shouts/image-alt-tags-and-title-tags-for-seo.aspx" target="_blank">here</a>',

    //Hotels Section
      "hotel_abstract" =>
      "A short one-sentence description of the hotel or package that will be shown when a visitor is viewing a listing of multiple options (like with the trip planner).",

      "internal_content" =>
      "This is the more detailed content that appears on the page dedicated to this particular hotel. Should feature an introduction, photos, description and ammenities sections",

      "icon" =>
      "This is the photo that will represent the hotel in the listing of hotels along with the abstract text",
      "grade" =>
      "Our hotels should all be either 3, 4 or 5 stars. One of each of these levels of quality will be listed as a \"Top pick\". In the case of boats (cruise ships, river boats) and lodges...",
      "service_facilities" =>
      "Various ammenities that the hotel may offer. These will all be listed at the bottom of the hotel's detailed description while the most common ones will be shown along with their corresponding symbols in the main hotel listing along with the abstract text and icon.",

      "top_pick" =>
      "One hotel for each number of stars will be the \"top pick\" hotel and will be the default hotel for all packages. Other
      hotels will be listed as additional options if the client is interested.",

      "search_images" =>

      "Here you can browse image files on the server or upload local files. To select multiple images, left click on images while holding down shift, then right click and choose \"select\" and all of the selected images will be added to the hotel&#39;s image gallery. This gallery will be shown on the hotel&#39;s details page.",

      "hotel_url"                       =>
      'For hotels the url should be the word "hotels" followed by the destination name and finally the name of the hotel all broken up by dashes
      and without special characters. Special characters will automatically be removed here and spaces converted to dashes. More info
      on good URLs for SEO <a href="http://webdesign.tutsplus.com/articles/seo-friendly-url-structure--webdesign-9569" target="_blank">here</a>.',

    // Destination Section

    "destination_url"=>
    'For destinations the url should be the word destinations followed by the name of the country followed by the destination within the country if there is one. Special characters will automatically be removed here and spaces converted to dashes. More info
    on good URLs for SEO <a href="http://webdesign.tutsplus.com/articles/seo-friendly-url-structure--webdesign-9569" target="_blank">here</a>.',
    "destination_name"          => '',
    "additional_name"           => '',

    // Destination Hotel Section

    "destination_hotel_url"=>
    'For Hotel Destinations the word "hotels" followed by the destination name, e.g. "hotels-cusco". Special characters will automatically be removed here and spaces converted to dashes. More info
    on good URLs for SEO <a href="http://webdesign.tutsplus.com/articles/seo-friendly-url-structure--webdesign-9569" target="_blank">here</a>.',
    "destination_name"          => '',
    "additional_name"           => '',
    "search_hotel"              => 'Examples of advanced searches:<br>
    destination: cusco<br/>
    top pick: yes / no<br/>
    top: yes / no<br/>
    publish: yes / no<br/>
    name: marriot<br/>',

    // Additional Section

    "additional_anchor"         =>
    'The text that will appear as the link to this set of additional service',
    "category_package_name"     =>
    'This name describes a grouping of packages which can in turned be grouped under other package categories',
    "description"               => '',

    // Category Package Section
    "category_package_url"  =>
    'For package categories the url should simply be the name of the category, e.g. "specials" or "deals". In the case of subcategories consult the development team. Special characters will automatically be removed here and spaces converted to dashes. More info
    on good URLs for SEO <a href="http://webdesign.tutsplus.com/articles/seo-friendly-url-structure--webdesign-9569" target="_blank">here</a>.',

    // Travel Guide section
    "travel_guide_name"         => '',
    "content"                   => '',
    "travel_guide_url"          =>
    'The default here is just the title with dashes instead of spaces. If you change the url ensure that it sticks to guidelines for SEO-friendly URLs.',

    // Section

    "title"                     => '',
    "content"                   => '',
    "signature"                 => '',
    "image"                     => '',
    "title_image"               => '',
    "physical_difficulty_name"  => '',
    "trip_style_name"           => '',

    // Open Graph SEO
    // Used this page as a resource: http://www.quicksprout.com/2013/03/25/social-media-meta-tags-how-to-use-open-graph-and-cards
    "open_graph_title" =>
    "Similar to the html title tag. Should give a name to the content as it will appear on facebook and have fewer than 95 characters.",
    "open_graph_type" =>
    'Tells facebook or other social media what kind of content this is e.g. "article". The full list of types can be found <a href="https://developers.facebook.com/docs/opengraph#types">here</a>.',
    "open_graph_image" =>
    "This is the image that will represent this content in a social graph like facebook&#39;s timeline",
    "open_graph_url" =>
    'This field is only necessary in the case that there is more than one url that points back to this page&#39;s content. Usually can left blank',
    "open_graph_description" =>
    'Similar to the meta description tag for websites. A short (less than 297 characters) catchy description to appear when this content is shared on social graphs like facebook&#39;s timeline',

    //Sectoin templates    
    'destination_template_header' => '<img src="/pfladmin/public/img/header.png">',

    // Open Graph SEO
    // Used this page as a resource: http://www.quicksprout.com/2013/03/25/social-media-meta-tags-how-to-use-open-graph-and-cards
    "twitter_card" =>
    'Similar to the "type" available for open graph. The options here are "photo" for images "player" for videos and "summary" for everything else. Defaults to "summary".',
    "twitter_creator" =>
    'This is the twitter username (e.g. @username) for the author of the content',
    "twitter_title" =>
    'Just like the facebook title this should be short clickbait e.g. "5 best hotel options for your visit to Cusco"',
    "twitter_image" =>
    'This is the image that will show up in twitter next to the text description and title. Select the appropriate image from the folder of images for twitter',
    "twitter_description" =>
    'This is the body text that will show up on twitter right after the title. Similar to the meta description you write for google. Should be less than 200 characters and compell people to come visit the website.',

  );
}



