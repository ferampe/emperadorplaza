<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://m.peruforless.com/packages/special1-heart-of-the-inca.php');
?>
<?php session_start(); ?>
<?php 
require_once("../controller/panelizquierdo.class.php");
	$pi = new PanelIzquierdo();	
	require_once("../controller/tourpackages.class.php");
	$tp = new TourPackages();	
	$tp->get_tourpackages(139);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php include("../includes/tag-optimizely.html") ?>
<title><?=$tp->head_title?></title>
<meta name="keywords" content="<?=$tp->head_keywords?>" />
<meta name="Description" content="<?=$tp->head_description?>" />
<link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.peruforless.com/packages/special1-heart-of-the-inca.php">
<link rel="start" type="text/html" href="/index.php" title="Home" />
<link rel="icon" href="http://www.peruforless.com/favicon.ico" />
<link href="../css/peruforless.css" rel="stylesheet" type="text/css" />
<link href="../css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<!--[if lte IE 7]><link rel="stylesheet" href="../css/jquery.tabs-ie.css" type="text/css" media="projection, screen" /><![endif]-->

<link rel="stylesheet" type="text/css" href="../js/lightbox/themes/carbono/jquery.lightbox.css" />
<script type="text/javascript" src="../js/jquery.lightbox.js"></script>
<script src="../js/jquery.validate.min-v1.11.1.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {	

	$('.lightbox').lightbox(); //CAMBIO FERNANDO 
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			firstname: "required",			
			email: {required: true,	email: true}
		},
		messages: {
			firstname: " Enter name",
			email: " Enter valid email address"
		}
	});	

	
});
</script>
</head>
<body id="tourpackages">
<?php include("../includes/sidechat.html") ?>
<div id="container">
<div id="header">
<?php include("../includes/header.html") ?>
<?php include("../includes/navmenu.html");?>
</div>
<div id="content">
<div id="showcase">
<?php include("../includes/video.php");?>
</div>
<?php include("../includes/social-media.html");?><p class="breadcrumb"><a href="/index.php">Home</a> › <a href="../packages/index.php">Tour Packages</a> › <?=$tp->title_category_migas?> <span class="b">›</span> <?=$tp->title?></p>
<div id="aside">
<?php include("../includes/ad-tripadvisor.html");?>
<div class="side-form">
<p class="subtitulo"> MORE INFORMATION</p>
<?php include("../includes/form-side-msg.php");?>
<form action="../procesa-packages.php" method="post" id="signupForm" >
<fieldset>
<input name="contactus" type="hidden" value="#1 Heart of the Inca" />
<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
<input name="url" type="hidden" value="<?=$url; ?>" />
<?php include("../includes/form-side.php");?>
</form>
</div>
<?php include("../includes/menu-specials.html");?>
 
</div>
<div id="main" class="lder link"><a name="topiti" id="topiti"></a>
<p class="b-contactus fder"><a href="../contactus-special1.php"> Personalize your dream adventure now</a></p>
<h1><?=$tp->title?></h1>
<p class="subtitulo2">Special 1:&nbsp;<?=$tp->sub_title_destinations?><br /><?=$tp->days?> <?=$tp->price?></p>
<div class="help-itinerary"><ul class="fder">
<li class="iemail"><a href="http://www.addthis.com/bookmark.php" 
        class="addthis_button_email">
E-mail</a> |</li><li class="iprint"><a href="#" class="addthis_button_print">Print This Trip</a></li></ul></div>
<div id="packages">
<ul>
<li><a href="#p1"><span>Overview</span></a></li>
<li><a href="#p2"><span>Itinerary</span></a></li>
<li><a href="#p3"><span>Prices and Hotels</span></a></li>
<li><a href="#p4"><span>Included</span></a></li>
<li><a href="#p5"><span>Additional Services</span></a></li>
</ul>
<div id="p1"> <div class="fder">
<img src="<?=$tp->image?>" alt="<?=$tp->alt?>" title="<?=$tp->title_image?>" width="185" height="160" class="i-important" style="float:none" />
<div class="infoalt">
<?php echo $tp->gallery_overview; ?>
<p class="mapa"><a href="../images/map/m-heart-of-the-inca.jpg" title="Special 1: Heart of the Inca" class="lightbox">View Route Map</a></p>
<p class="b">Tour Highlights</p>
<?=$tp->tour_highlights?>
<hr />
<p class="b">Trip Style</p>
<?=$tp->trip_style?>
<hr />
<p class="b">Physical Difficulty</p>
<ul><li><?=$tp->physical_difficulty?></li></ul></div>
</div>
<?=$tp->overview?>
<?//=$tp->titles_itineraries?>
<p class="b-insurance"><a href="../resources/traveler-insurance.php">Go Covered:  Free Travel Insurance now included</a></p>
<br class="clear" />
<?php include("../includes/ad-chat.html") ?>
</div>
<div id="p2">
<?=$tp->itinerary?>
<br />
<?=$tp->full_price?>
<p><a href="#topiti"><img src="../images/b-top.png" alt="Go Top" width="64" height="28"  /></a></p>
<br class="clear" /></div>
<div id="p3">
<!--<p class="cen linkanclas fbottom"><a href="#buenosaires">Buenos Aires Hotels </a> |  <a href="#iguazu">Iguazú Hotels</a> |  <a href="#puertomadryn">Puerto Madryn Hotels </a> |  <a href="#ushuaia">Ushuaia Hotels</a> |  <a href="#calafate">El Calafate Hotels</a> |  <a href="#bariloche">Bariloche Hotels</a></p>-->
<?=$tp->full_price?>

<a name="cusco" id="cusco"></a>
<h2 class="larri">Top Pick Cusco Hotel</h2>
<h3>Aranwa Boutique Hotel 5*</h3>
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-cusco-aranwa.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox" >view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-cusco-aranwa.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox" ><img src="../images/hotels/cusco/icon-aranwa.jpg" alt="Aranwa Boutique Hotel picture, Cusco hotels, Peru For Less" width="185" height="160" /></a>
		 <p>San Juan de Dios 255, near Plaza Regocijo, Cusco</p>
		  <p>Inaugurated in 2010, Aranwa Boutique Hotel is operated  by Aranwa Hotels Resorts &amp; Spas, a luxurious Peru hotel chain known for providing  careful attention to clients' well-being. This elegant 5-star Cusco hotel,  probably the best value luxury accommodation in town, is housed in a converted  16th-century mansion and decorated with colonial-era furniture, impressive  paintings from the Cusco School (Escuela Cuzqueña), and gold-leaf plated  carvings and sculptures. This boutique hotel is conveniently located on a  street between Plaza San Francisco and Plaza Regocijo, a new upscale  neighborhood away from the bustle but within walking distance of Cusco's main  square, top restaurants, and must-see museums. Each room boasts an oxygen  system and a variety of soothing spa treatments, making this an ideal resting place  for those who want to acclimatize to Cusco’s high altitude in a most  comfortable setting.</p>
<p class="iconhotel"><span class="restaurant">Restaurant</span>   <span class="roomservice">Room Service</span> <span class="internet">Internet</span> <span class="laundryservice">Laundry Service</span> <span class="spa">Spa</span></p>
<p><a href="../resources/hotels-cusco-aranwa-boutique.php">Aranwa Boutique Hotel Photos &amp; Info »</a></p>
         <hr />


  

	<h3>Andean Wings Boutique Hotel 4*</h3>
	<div id="gallery-hotels"><a href="http://www.peruforless.com/resources/hotels-cusco-andean-wings.php" >view gallery</a></div>
<div style='clear:both;'></div>
	<a href="http://www.peruforless.com/resources/hotels-cusco-andean-wings.php"><img src="/images/hotels/cusco/icon-andean-wings.jpg" alt="" width="185" height="160"></a>
	<p>Siete Cuartones, 225, Cusco</p>
	<p>
	Located in a magnificent colonial house that dates back to over 300 years ago, this charming boutique hotel offers excellent services in a luxurious atmosphere. The Andean Wings Boutique Hotel strives to provide guests with an intimate setting as well as the highest quality amenities in the heart of magical Cusco. The rooms are extremely well appointed and inviting; the restaurant offers original and delicious dishes in the hotel’s interior patio; and the spa’s amazing services are assured to keep guests relaxed. The small size of the hotel, with only 18 rooms, allows for personalized attention to each and every guest.</p>
	<p class="iconhotel">
					<span class="restaurant">Restaurant</span> 
					<span class="spa">Spa</span> 
					<span class="roomservice">Room Service</span> 
					<span class="internet">Internet</span> 
					<span class="laundryservice">Laundry Service</span> 
				</p>
	<p><a href="http://www.peruforless.com/resources/hotels-cusco-andean-wings.php">Andean Wings Boutique Hotel Photos &amp; Info</a>  |</p>

         <hr />



<h3>Boutique Hotel Casa San Blas *3</h3>

<div id="gallery-hotels"><a href="http://www.peruforless.com/resources/hotels-cusco-casa-san-blas.php" >view gallery</a></div>

<div style="clear:both;"></div>
<a href="http://www.peruforless.com/resources/hotels-cusco-casa-san-blas.php"><img src="/images/hotels/cusco/icon-casa-san-blas.jpg" alt="" width="185" height="160"></a>
<p>Tocuyeros 566, San Blas, Cusco</p>
<p>
	Located in the historic artisan’s quarter of San Blas, this boutique hotel is privately situated, but still close to restaurants, bars, artisan workshops, and galleries. Only two and a half blocks from the central Plaza de Armas, the Boutique Hotel Casa San Blas is near all the main attractions in Cusco, but provides the peace and tranquility guests look forward to after a long day exploring Inca ruins. With gorgeous wooden furnishings, a pretty terrace area with umbrellas, potted plants, and colorful artwork, you will feel at home in this charming hotel. Guestrooms boast handmade colonial furniture and Andean weavings as well as lush bedding for a good night’s rest. Enjoy a delicious dinner or cocktail in the downstairs restaurant before indulging in a luxurious massage in your room. The staff at this excellent-value Cusco hotel will work overtime to make your stay a pleasant one.</p>
	<p class="iconhotel">
					<span class="restaurant">Restaurant</span> 
					<span class="roomservice">Room Service</span> 
					<span class="internet">Internet</span> 
					<span class="laundryservice">Laundry Service</span> 
				</p>
<p><a href="http://www.peruforless.com/resources/hotels-cusco-casa-san-blas.php">Boutique Hotel Casa San Blas Photos &amp; Info</a></p>



<br class="clear" />
<p class="link2 cen b"><a href="../resources/hotels-cusco.php">See all Cusco hotels </a></p><br />
<p class="cen"><a href="../contactus-special1.php"><img src="../images/b-plan-your-trip.png" alt="Plan Your Trip" width="264" height="52" style="float:none" /></a></p>
<a name="machupicchu" id="machupicchu"></a>
<h2>Top Pick Machu Picchu Hotel</h2>
<h3>Machu Picchu Pueblo Hotel 5*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-machu-picchu-el-pueblo.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>

<a href="../gallery/external-galleries/h-machu-picchu-el-pueblo.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/machu-picchu/icon-pueblo-hotel.jpg" alt="Machu Picchu Pueblo Hotel picture, Machu Picchu hotels, Peru For Less" width="185" height="160" /></a>
		 <p>Kilometer 110 Via Ferrea, Aguas Calientes</p>
<p>The  Inkaterra Machu Picchu Pueblo Hotel is a naturalist's haven. Idyllically  nestled in the verdant Andean cloud forest, this lovely hotel is the perfect  place to become immersed in the astonishing flora and fauna of the region. The  eco-friendly hotel resembles an Andean village and is comprised of charming  white-washed cottages decorated with modern indigenous art as well as authentic  pre-Columbian artifacts. With a commitment to indulging the whims of its  guests, this luxury hotel delivers impeccable service amidst a natural paradise  to create a one-of-a-kind Machu Picchu vacation experience. Try some regional  dishes and fusion cuisine at the excellent restaurant overlooking the Urubamba  River.</p>
<p class="iconhotel"><span class="restaurant">Restaurant</span>   <span class="roomservice">Room Service</span> <span class="internet">Internet</span> <span class="laundryservice">Laundry Service</span> <span class="parking">Parking</span></p>
<p><a href="../resources/hotels-machu-picchu-pueblo.php">Machu Picchu Pueblo Hotel Photos &amp; Info »</a></p>
         <hr />
<h3>El Mapi Hotel 4*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-machu-picchu-mapi.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-machu-picchu-mapi.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/machu-picchu/icon-el-mapi.jpg" alt="El Mapi Hotel picture, Machu Picchu hotels, Peru For Less " width="185" height="160" /></a>
		 <p>Av. Pachacutec 109, Aguas Calientes</p>
<p>The  recently renovated El Mapi Hotel is perfect for travelers who want to catch the  sunrise over the ruins. This top Machu Picchu hotel is ideally located on a  central street in the middle of Aguas Calientes village, a 5 minute walk from  train station, and 2 blocks from where the buses depart for the short ride to the  Machu Picchu ruins. Modern and stylish, this hotel aims to be the best in its  category and offers great value services and décor. It also boasts beautifully  landscaped gardens and a hot tub where guests can relax at night with a  cocktail after a delicious dinner.</p>
<p class="iconhotel"><span class="restaurant">Restaurant</span>  <span class="roomservice">Room Service</span> <span class="laundryservice">Laundry Service</span><span class="internet">Internet</span></p>
<p><a href="../resources/hotels-machu-picchu-el-mapi.php">El Mapi Hotel Photos &amp; Info »</a></p>
         <hr />
<h3>Andina Luxury Hotel 3*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-machu-picchu-andina-luxury.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-machu-picchu-andina-luxury.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/machu-picchu/icon-andina-luxury.jpg" alt="Andina Luxury Hotel picture, Machu Picchu hotels, Peru For Less" width="185" height="160" /></a>
		 <p>Avenida  Imperio de los Incas S/N, Aguas Calientes</p>
<p>Travelers  looking for comfort and convenience on a trip to Machu Picchu will be pleased  with this excellent hotel. Andina Luxury Hotel is situated just 200 meters from  the train station and boasts 31 fully-equipped and tastefully decorated rooms.  Each accommodation features wooden furnishings, a large bed covered with  comfortable bed linens, and some rooms provide breathtaking views of the river.  Andean art adds the finishing touch to the room. All accommodations come with  Internet, an LCD cable television, and air-conditioning. The hotel also serves  guests with a restaurant, bar, sauna, and gym. </p>
<p class="iconhotel"><span class="restaurant">Restaurant</span>  <span class="roomservice">Room Service</span> <span class="internet">Internet</span> <span class="laundryservice">Laundry Service</span> <span class="gym">Gym</span> <span class="parking">Parking</span> <span class="spa">Spa</span> <span class="swimmingpool">Swimming Pool</span></p>
<p><a href="../resources/hotels-machu-picchu-andina-luxury.php">Andina Luxury Hotel Photos &amp; Info »</a></p>
<br class="clear" />
<p class="link2 cen b"><a href="../resources/hotels-machu-picchu.php">See all Machu Picchu hotels</a></p>
<a name="sacredvalley" id="sacredvalley"></a>
<h2>Top Pick Sacred Valley Hotel</h2>
<h3>Aranwa Sacred Valley Hotel 5*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-sacred-valley-aranwa.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-sacred-valley-aranwa.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/sacred-valley/icon-aranwa.jpg" alt="Aranwa Sacred Valley Hotel picture, Sacred Valley hotels, Peru For Less" width="185" height="160" /></a>
		 <p>Huayllabamba-Urubamba </p>
<p>Built on the grounds of a  seventeenth century colonial hacienda, along the tranquil banks of the  Vilcanota River, the Aranwa Sacred Valley Hotel is the picture-perfect place  for a countryside retreat. The hotel showcases a fusion of minimalist interior  designs and colonial style buildings, all surrounded by sweeping views of the  breathtakingly beautiful Sacred Valley. </p>
<p class="iconhotel"><span class="restaurant">Restaurant</span> <span class="roomservice">Room Service</span> <span class="internet">Internet</span> <span class="laundryservice">Laundry Service</span> <span class="parking">Parking</span> <span class="babysitter">Baby Sitter</span> <span class="giftshop">Gift Shop</span> <span class="spa">Spa</span></p>
<p><a href="../resources/hotels-sacred-valley-aranwa.php">Aranwa Sacred Valley Hotel Photos &amp; Info »</a></p>
         <hr />
<h3>Casa Andina Private Collection Valle Sagrado 4*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-sacred-valley-casa-andina-private.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-sacred-valley-casa-andina-private.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/sacred-valley/icon-casa-andina-private.jpg" alt="Casa Andina Private Collection Valle Sagrado picture, Sacred Valley hotels, Peru For Less" width="185" height="160" /></a>
		 <p>5to  Paradero, Yanahuara</p>
<p>A prominent member of the Casa Andina chain, the  Private Collection is a luxurious Sacred Valley hotel, comfortably nestled in  the heart of the valley only 10 minutes from the ruins of Ollantaytambo.  Combining relaxation in its luxurious spa with sports activities such as bike  riding or hiking, this excellent hotel encompasses a range facilities and  amenities to suit all taste. The hotel also features a delicious restaurant,  playgrounds, a jewelry store and an on-site observatory allowing guests to  admire the beautiful star-filled Andean sky.</p>
<p class="iconhotel"><span class="restaurant">Restaurant</span>  <span class="roomservice">Room Service</span> <span class="laundryservice">Laundry Service</span> <span class="parking">Parking</span> <span class="spa">Spa</span> <span class="gym">Gym</span> <span class="babysitter">Baby Sitter</span></p>
<p><a href="../resources/hotels-sacred-valley-casa-andina-private.php">Casa Andina Private Collection Valle Sagrado Photos &amp; Info »</a></p>
         <hr />
<h3>El Albergue Bed &amp; Breakfast 3*</h3> 
<div id="gallery-hotels"><a href="../gallery/external-galleries/h-sacred-valley-el-albergue.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox">view gallery</a></div>
<div style='clear:both;'></div>
<a href="../gallery/external-galleries/h-sacred-valley-el-albergue.html?lightbox[iframe]=true&amp;lightbox[width]=812&amp;lightbox[height]=610" class="lightbox"><img src="../images/hotels/sacred-valley/icon-el-albergue-bed.jpg" alt="El Albergue picture, Sacred Valley hotels, Peru For Less" width="185" height="160" /></a>
		 <p>Av. Ferrocarril, Ollantaytambo</p>
		  <p>Adjacent  to the Ollantaytambo train station, this quaint bed &amp; breakfast is nicely  located at the midpoint between Cusco and Machu Picchu, making it the perfect  place to rest before visiting the mountaintop ruins, the historic city of  Cusco, or the surrounding Sacred Valley attractions. This hotel originally  started operating in 1925 and was the first hotel to open in the area. A  10-minute walk takes guests to the main plaza of Ollantaytambo, an original  Inca city definitely worth exploring. </p>
<p class="iconhotel"><span class="restaurant">Restaurant</span> <span class="internet">Internet</span> <span class="laundryservice">Laundry Service</span></p>
<p><a href="../resources/hotels-sacred-valley-el-albergue.php">El Albergue Bed & Breakfast Photos &amp; Info »</a></p>
<br class="clear" />
<p class="link2 cen b"><a href="../resources/hotels-sacred-valley.php">See all Sacred Valley hotels</a></p>
<div class="alerta2">
<?php include("../includes/nota-hotels.html") ?>
</div>
<!--<p class="cen linkanclas ftop labj"><a href="#buenosaires">Buenos Aires Hotels </a> |  <a href="#iguazu">Iguazú Hotels</a> |  <a href="#puertomadryn">Puerto Madryn Hotels </a> |  <a href="#ushuaia">Ushuaia Hotels</a> |  <a href="#calafate">El Calafate Hotels</a> |  <a href="#bariloche">Bariloche Hotels</a></p>-->
</div>
<div id="p4">
<?=$tp->included?>
</div>
<div id="p5">
<?=$tp->additional_services?>
</div>
</div>
<p class="cen contactus"><a href="../contactus-special1.php"><img src="../images/b-contactus.png" width="190" height="52" alt="Contact Us" /></a></p>
<p class="cen linkmisc"><a href="../gallery/index.php">Peru Pictures</a> |  <a href="../resources/hotels.php">Peru Hotels</a> |  <a href="../packages/index.php">Peru Tour Packages</a><!-- |  <a href="../resources/newsletter.php">Sign up for travel deals</a>--></p>
</div>
<div class="clear"></div>
<?php include("../includes/footer2.html") ?>
</div>
<?php include("../includes/footer.html") ?>
</div>
<script src="../js/jquery.tabs.pack.js" type="text/javascript"></script>
<script src="../js/scripts.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="../js/jquery.lightbox-0.3.js"></script>-->

<?php include_once("../analyticstracking.php") ?>
<?php include_once("../js/crazy-egg.js") ?>
</body>
</html>