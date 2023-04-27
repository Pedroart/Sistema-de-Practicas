<?php
namespace app\controllers;

include _core_."/view.php";
include __DIREC__."/app/models/user_model.php";;

use core;
use app\models;

class user extends core\controller{
    
    static public function verificarLogin()
    {
        
        $json = file_get_contents('php://input');
        $datos = json_decode($json);

        if(is_null($datos)){
            header('Content-Type: application/json');
            echo json_encode(["resultado" => "datosNoIngresados"]);
            return;
        }

        $base = new \app\models\user_model;
        $responde = $base->loginUsario($datos->email,$datos->password);



        header('Content-Type: application/json');
        echo json_encode(["resultado" => $responde]);
        
    }
    static public function cerrarSesion(){
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode(["resultado" => true]);
    }
}