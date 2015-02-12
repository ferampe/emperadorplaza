// Register a template definition set named "default".
CKEDITOR.addTemplates( 'default',
{
	// The name of the subfolder that contains the preview images of the templates.
	imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),
 
	// Template definitions.
	templates :
		[
			{
				title: 'Tab Destination 1',
				//image: 'template1.gif',
				description: '5 Columns x 7 Columns',
				html:'<div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div><div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div><div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div><div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div><div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div><div class="row"><div class="col-sm-5"> Image </div><div class="col-sm-7"> Content </div></div>'
			},

			{
				title: 'Tab Destination 2',
				//image: 'template1.gif',
				description: '6 Columns x 6 Columns',
				html:'<div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div><div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div><div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div><div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div><div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div><div class="row"><div class="col-sm-6"> Image </div><div class="col-sm-6"> Content </div></div>'
			},
			
			{
				title: 'Letters',
				//image: 'template1.gif',
				description: 'Letters',
				html:'<p>Content</p><small>Signature</small>'
			},
			{
				title: 'Blog',
				//image: 'template1.gif',
				description: 'Blog',
				html:'<a href="#" target="_blank"><img src="path" alt=""></a><h3 class="h6"><a href="#" target="_blank">Title</a></h3><p>content</p>'
			}
		]
});