<?php
namespace app\controllers;

include _core_."/view.php";
include __DIREC__."/app/models/user_model.php";;

use core;
use app\models;

class user extends core\controller{
    
    static public function verificarLogin()
    {
        
        $base = new \app\models\user_model();
        $base->loginUsario("","");


        header('Content-Type: application/json');
        echo json_encode(["resultado" => false]);
    }
    static public function cerrarSesion(){
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode(["resultado" => true]);
    }
}