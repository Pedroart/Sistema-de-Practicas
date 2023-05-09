<?php

$config = (object) array(
    
    'database' => (object) array(
        'host' => 'localhost',
        'username' => 'root',
        'pass' => 'password',
        'database' => 'db'
    ),

    'app_info' => (object) array(
        'appName'=>"Sistema de Practicas",
        'appURL'=> "http://practicas.test"
    )
);

// Carpetas
define('_app_',__DIREC__.'/app');
define('_cor_',__DIREC__.'/core');
define('_pub_',__DIREC__.'/public');
define('_ven_',__DIREC__.'/vendedor');
define('_view_',_app_.'/views');

// URL
define('_URL_',$config->app_info->appURL);