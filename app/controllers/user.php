<?php
namespace app\controllers;

include _core_."/view.php";

use core;

class user extends core\controller{
    
    static public function verificarLogin()
    {
        // Resivir los datos json


        //
        $_SESSION['user_id']=1;

        header('Content-Type: application/json');
        echo json_encode(["resultado" => true]);
    }
    static public function cerrarSesion(){
        session_destroy();
        header('Content-Type: application/json');
        echo json_encode(["resultado" => true]);
    }
}