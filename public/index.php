<?php


define("__DIREC__",str_replace("/public","",$_SERVER['DOCUMENT_ROOT']) );
include __DIREC__."/core/config.php";
include __DIREC__."/core/autoloader.php";

$roteador = new core\router;

$roteador->post('/api/departamentos', function(){
    $controlador = new app\models\lugar();
    header('Content-type: application/json');
    echo json_encode( $controlador->departamentos(18) );
    
});

$roteador->post('/api/provincia', function(){
    $controlador = new app\models\lugar();
    header('Content-type: application/json');
    echo $_POST['id'];//json_encode( $controlador->provincia($_POST['id']) );

});


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

$roteador->post('/validacion/put', function(){
    $controlador = new app\controllers\vali_matri();$controlador->updateFile_();
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
        $controlador->proceso($data['id_etapa']);
        return;
    }
    // Realizar proceso
    core\view::view_dashboard('conf_proceso',["titulo"=>"Efectivas","proceso"=>1]);
        
});

$roteador->get('/efectivas/proceso/$id', function($id){
    $controlador = new app\controllers\p_efectiva();
    $data=$controlador->pre_proceso($_SESSION['id_user']);
    $controlador->proceso_id($id,$data['id_etapa']);
});

$roteador->get('/efectivas/cartas', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->cartas();
});

$roteador->get('/efectivas/estado', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->estado();
});

$roteador->get('/desempeno', function(){
    $controlador = new app\controllers\p_desempeno();$controlador->index();
});

$roteador->get('/efectivas/proceso', function(){
    
    $controlador = new app\controllers\p_efectiva();
    $data=$controlador->pre_proceso($_SESSION['id_user']);
    if($data!=false){
        if($data["id_proceso"]==1)
        $controlador->proceso($data['id_etapa']);
        return;
    }
    // Realizar proceso
    core\view::view_dashboard('conf_proceso',["titulo"=>"Efectivas","proceso"=>1]);
        
});

$roteador->get('/validaciones', function(){
    $controlador = new app\controllers\p_validaciones();$controlador->index();
});

$roteador->get('/validaciones/$id', function($id){
    $controlador = new app\controllers\p_validaciones();$controlador->edit($id);
});

$roteador->post('/validaciones/aceptado/$id', function($id){
    $controlador = new app\models\matricula;$controlador->aceptado($id);
});

$roteador->post('/validaciones/revisar/$id', function($id){
    $controlador = new app\controllers\p_validaciones();$controlador->revisar($id);
});

$roteador->post('/validaciones/rechazar/$id', function($id){
    $controlador = new app\models\matricula;$controlador->rechazar($id);
});

$roteador->get('/procesos', function(){
    $controlador = new app\controllers\p_procesos();$controlador->index();
});

$roteador->any('/404','app/views/404.php');