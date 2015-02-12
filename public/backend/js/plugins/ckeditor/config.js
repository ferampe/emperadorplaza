/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	// config.uiColor = '#AADC6E';
	// 
	// 
	config.stylesSet = 'my_styles';
	//config.removePlugins = 'font,forms,flash,iframe,justify';
	path = window.location.host;
	//config.filebrowserBrowseUrl = 'http://localhost/pflAdmin/public/index.php/elfinder/ckeditor4';
	config.filebrowserBrowseUrl = 'http://'+path+'/pfladmin/public/index.php/elFinderCkeditor4';

	
	//config.protectedSource.push( /<\?[\s\S]*?\?>/g );   // PHP code
	//config.templates_files = [ 'http://localhost/pflAdmin/public/backend/js/plugins/ckeditor/plugins/templates/templates/price_template.js' ];
	config.templates_replaceContent = false;
};

CKEDITOR.stylesSet.add( 'my_styles', [
    // Block-level styles.
    { name: 'Blue Title', element: 'h2', styles: { color: 'Blue' } },
    { name: 'Red Title',  element: 'h3', styles: { color: 'Red' } },

    // Inline styles.
    { name: 'CSS Style', element: 'span', attributes: { 'class': 'my_style' } },
    { name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }
]);

