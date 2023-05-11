<?php


define("__DIREC__",str_replace("/public","",$_SERVER['DOCUMENT_ROOT']) );
include __DIREC__."/core/config.php";
include __DIREC__."/core/autoloader.php";

$roteador = new core\router;

// Login
if (! isset($_SESSION['id_user'])){
    $roteador->get('/', function(){
        $controlador = new app\controllers\login();$controlador->index();
    });
    $roteador->post('/login',function(){
        $controlador = new app\controllers\login();$controlador->login();
    });

    $roteador->any('/404','app/views/404.php');
}

$roteador->post('/logout', function(){
    $controlador = new app\controllers\login();$controlador->logout();
});

$roteador->get('/', function(){
    $controlador = new app\controllers\home();$controlador->index();
});

$roteador->post('/validacion', function(){
    $controlador = new app\controllers\vali_matri();$controlador->create_();
});

$roteador->get('/validacion', function(){
    $controlador = new app\controllers\vali_matri();$controlador->index();
});

$roteador->post('/proceso/create',function(){
    $modelo = new app\models\proceso();
    $modelo->creata($_POST['id']);
});

$roteador->get('/efectivas', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->index();
});

$roteador->get('/efectivas/proceso', function(){
    
    $controlador = new app\controllers\p_efectiva();
    $data=$controlador->pre_proceso($_SESSION['id_user']);
    if($data!=false){
        if($data["id_proceso"]==1)
        $controlador->proceso();
        return;
    }
    // Realizar proceso
    core\view::view_dashboard('conf_proceso',["titulo"=>"Efectivas","proceso"=>1]);
        
});

$roteador->get('/efectivas/proceso/$id', function($id){
    $controlador = new app\controllers\p_efectiva();$controlador->proceso_id($id);
});

$roteador->get('/efectivas/cartas', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->cartas();
});


$roteador->any('/404','app/views/404.php');