<?php

return array(

    /**
     * Put the name of the folder where the files were stored, 
     * relative to folder public your project
     * 
     */
    'folder_path' => 'images',


    'lang' => 'es',

    /**
     * Hidden folder start dot (.)
     */

    'access' => 'Ferampe\Elfindercontrol\Elfindercontrol::access',

    /**
     * Custom option
     */
    'roots' => array(

            array(
                'driver'        => 'LocalFileSystem',
                'path'          => '/home/peruforl/public_html/images',
                'URL'           => 'http://www.peruforless.com/images',
                'accessControl' => 'access'
            )
            )


);
