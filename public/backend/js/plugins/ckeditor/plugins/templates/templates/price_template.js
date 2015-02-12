// Register a template definition set named "default".
CKEDITOR.addTemplates( 'default',
{
	// The name of the subfolder that contains the preview images of the templates.
	imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),
 
	// Template definitions.
	templates :
		[
			{
				title: 'Model Price 1',
				//image: 'template1.gif',
				description: 'Description of My Template 1.',
				html:
					'<table class="table" ><thead><tr><th>Occupancy</th><th>3 Star</th><th>4 Star</th><th>5 Star </th></tr></thead><tbody><tr><th class="th" scope="row">Double/Triple</th><td> (100)</td><td> (100) </td><td> (100)</td></tr><tr><th class="th" scope="row">Single</th><td> (100)</td><td> (100)</td><td> (100)</td></tr><tr><td colspan="5"><p>Prices may vary according to the season, availability, and client preferences. Certain transport costs may not be included. Please contact one of our expert travel advisors for more information.</p></td></tr></tbody></table>'
			},
			{
				title: 'Fernando 2',
				html:
					'<h3>Template 2</h3>' +
					'<p>Type your text here.</p>'
			}
		]
});