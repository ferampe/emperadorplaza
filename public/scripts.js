$(document).ready(function() {
	
	$("a[rel$='external']").click( function() {
	   window.open( $(this).attr('href') );
	   return false;
	});

	/*if ( $("a.lightbox").length ) {
	  $('a.lightbox').lightBox();
	}*/
	
});