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

    public function crear_usuarios()  {
        core\view::view_dashboard("gestion_usuario/generar_alumnos",["titulo"=>""]);
        return;
    }

    public function lista_usuarios(){
        $scrips =[
            "/plugins/datatables/jquery.dataTables.min.js",
            "/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
            "/plugins/datatables-responsive/js/dataTables.responsive.min.js",
            "/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
            "/plugins/datatables-buttons/js/dataTables.buttons.min.js",
            "/plugins/datatables-buttons/js/buttons.bootstrap4.min.js",
            "/plugins/jszip/jszip.min.js",
            "/plugins/pdfmake/pdfmake.min.js",
            "/plugins/pdfmake/vfs_fonts.js",
            "/plugins/datatables-buttons/js/buttons.html5.min.js",
            "/plugins/datatables-buttons/js/buttons.print.min.js",
            "/plugins/datatables-buttons/js/buttons.colVis.min.js"];
        $user = new app\models\user();
        core\view::view_dashboard("gestion_usuario/tabla_alumnos",["titulo"=>"","Data"=>$user->Datos_Alumnos()],$scrips);
        return;
    }
}