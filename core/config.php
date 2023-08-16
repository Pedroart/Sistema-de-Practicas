<?php

/*
    En este código se define una serie de constantes y una configuración
    en forma de objeto. Las constantes definidas representan rutas a carpetas
    en el sistema, y el objeto $config contiene información relevante sobre la
    configuración de la base de datos y la aplicación en sí. Estas constantes y
    configuraciones pueden ser utilizadas en toda la aplicación para acceder a
    rutas y valores específicos.
*/

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