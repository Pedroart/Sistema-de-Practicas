<?php

define("__DIREC__",str_replace("/public","",$_SERVER['DOCUMENT_ROOT']) );


include "../core/conf.php";
include "../core/autoloader.php";
include "../core/router.php";
include _core_."/view.php";

// Etapa de Verificacion

if(!isset($_SESSION['user_id'])){
    get('/','app/views/login.php' );
    post('/login', function(){ \app\controllers\user::verificarLogin(); } );
    any('/404','app/views/404.php');
}

get('/', function(){ \app\controllers\home::display(); } );

post('/logout', function(){ \app\controllers\user::cerrarSesion(); } );

// Desempeño Laboral
get('/desempeno', function(){view_dashboard('desempeno/index',[]);} );
get('/desempeno/proceso', function(){view_dashboard('desempeno/proceso',[]);} );
get('/desempeno/estado', function(){view_dashboard('desempeno/index',[]);} );


any('/404','app/views/404.php');
