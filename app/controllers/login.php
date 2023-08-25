<?php

namespace app\controllers;
use core;
use app;

class login extends core\controller {

    public function index()
    {
        core\view::view_('login',[]);
        return;     
    }

    public function login()
    {
        header('Content-type: application/json');

        if($_POST['email'] === '' &&  $_POST['password'] === ''){
            echo json_encode( ['resultado'=> false] );
            return; 
        }

        
        $controller = new app\models\user();
        $respuesta = $controller->vericador($_POST['email'],$_POST['password']);

        echo json_encode( ['resultado'=> $respuesta] );
        return; 
    }

    public function logout()
    {
        // Datos de Usuario
        unset($_SESSION['id_user']);
        unset($_SESSION['role']);
        unset($_SESSION['DATA_ALUMNO']);

        session_destroy();
        header('Content-type: application/json');
        echo json_encode( ['resultado'=> true] );
    }


    public function gestion_usuario(){
        core\view::view_dashboard("gestion_usuario/alumno",["titulo"=>""]);
        return;       
    }
}