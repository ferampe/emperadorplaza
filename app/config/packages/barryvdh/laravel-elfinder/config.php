<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */

    'dir' => 'img',

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots' => array(
                array(
                    'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
                    'path'          => public_path() . DIRECTORY_SEPARATOR . 'img',         // path to files (REQUIRED)
                    'URL'           => asset('img'), // URL to files (REQUIRED)
                    'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
                )/*,
                array(
                    'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
                    'path'          => public_path() . DIRECTORY_SEPARATOR . 'img',         // path to files (REQUIRED)
                    'URL'           => asset('img'), // URL to files (REQUIRED)
                    'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
                )*/
            ),
    
    /*
    |--------------------------------------------------------------------------
    | CSRF
    |--------------------------------------------------------------------------
    |
    | CSRF in a state by default false.
    | If you want to use CSRF it can be replaced with true (boolean).
    |
    */

    'csrf'=>null,

);
