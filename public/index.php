<?php

/*

Implementa un enrutador que maneja diversas rutas y acciones en una aplicación PHP.
Estas rutas abarcan áreas como autenticación y procesos.

*/ 

define("__DIREC__",str_replace("/public","",$_SERVER['DOCUMENT_ROOT']) );
include __DIREC__."/core/config.php";
include __DIREC__."/core/autoloader.php";

$roteador = new core\router;

$roteador->post('/api/registraralumnos', function(){
    $user = new app\models\user();
    header('Content-type: application/json');
    echo json_encode($user->crearUsuarios() );
});

$roteador->post('/api/departamentos', function(){
    $controlador = new app\models\lugar();
    header('Content-type: application/json');
    echo json_encode( $controlador->departamentos(18) );
});

$roteador->post('/api/provincia', function(){
    $controlador = new app\models\lugar();
    header('Content-type: application/json');
    echo json_encode( $controlador->provincia($_POST['id']) );
});

$roteador->post('/api/distrito', function(){
    $controlador = new app\models\lugar();
    header('Content-type: application/json');
    echo json_encode( $controlador->distrito($_POST['id']) );
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

$roteador->get('/documentos', function(){
    core\view::view_dashboard('documentos', ["titulo"=>null]);
});

$roteador->get('/usuario', function(){
    $controlador = new app\controllers\login();$controlador->gestion_usuario();
});


$roteador->get('/efectivas', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->index();
});

$roteador->get('/efectivas/proceso', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->proceso();
});

$roteador->get('/efectivas/proceso/$id', function($id){
    $controlador = new app\controllers\p_efectiva();$controlador->proceso($id);
});

$roteador->post('/efectivas/proceso', function(){
    $controlador = new app\controllers\p_efectiva();
    $controlador->update_proceso($_POST["etapa"],$_POST["estado"]);
    
    header('Content-type: application/json');
    echo json_encode( ["resultado"=>true] );
});

$roteador->get('/efectivas/cartas', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->cartas();
});
$roteador->get('/efectivas/cartas/$id', function($id){
    $controlador = new app\controllers\p_efectiva();$controlador->cartas_descarga($id);
});

$roteador->get('/efectivas/estado', function(){
    $controlador = new app\controllers\p_efectiva();$controlador->estado();
});

$roteador->get('/desempeno', function(){
    $controlador = new app\controllers\p_desempeno();$controlador->index();
});


$roteador->get('/desempeno/proceso', function(){
    
    $controlador = new app\controllers\p_desempeno();
    $data=$controlador->pre_proceso($_SESSION['id_user']);
    
    if($data!=false){
        if($data["proceso_id"]==2)
        $controlador->proceso($data['id'],$data['id_etapa'],$data['id_estado']);
        return;
    }
    // Realizar proceso
    echo "hola";
    core\view::view_dashboard('conf_proceso',["titulo"=>"Desempeño Laboral","proceso"=>2]);
        
});

$roteador->get('/desempeno/proceso/$id', function($id){
    $controlador = new app\controllers\p_desempeno();
    $data=$controlador->pre_proceso($_SESSION['id_user']);
    $controlador->proceso_id($id,$data['id_etapa'],$data['id'],$data['id_estado']);
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

$roteador->get('/procesos/$id', function($id){
    $controlador = new app\controllers\p_procesos();$controlador->edit($id);
});

$roteador->get('/procesos/$id/Estado', function($id){
    $controlador = new app\controllers\p_procesos();$controlador->estado($id);
});


$roteador->post('/procesos/aceptado/$id', function($id){

    $controlador = new app\models\proceso;
    header('Content-type: application/json');
    $etapa_actual = $controlador->getProceso($id)["proceso_etapa"];
    $etapa_siguiente = $controlador->siguienteProceso( $etapa_actual ) ["tetp_id_siguiente_etapa"];

    if($etapa_actual != $etapa_siguiente ){
        $controlador->actualizar_estado($id,["procesos_estado"=>1,"proceso_etapa"=>$etapa_siguiente ]);
    }
    else{
        $controlador->actualizar_estado($id,["procesos_estado"=>3,"procesos_finalizado"=>1 ]);
    }
    echo json_encode( [true] );
});

$roteador->post('/procesos/revisar/$id', function($id){

    $controlador = new app\controllers\p_procesos();$controlador->revisar($id);
    header('Content-type: application/json');
    echo json_encode( [true] );
});

$roteador->get('/crear_usuarios', function(){
    $controlador = new app\controllers\login();$controlador->crear_usuarios();
});

$roteador->any('/404','app/views/404.php');