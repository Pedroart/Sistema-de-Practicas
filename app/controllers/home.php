<?php
namespace app\controllers;

include _core_."/view.php";


use core;

class home extends core\controller{
    static public function display(){
        
        if ($_SESSION['role'] == "admin"){
            view_dashboard('index_admin',[]);
        }elseif ($_SESSION['role'] == "docente") {
            view_dashboard('index_docente',[]);
        }elseif ($_SESSION['role'] == "estudiante") {
            view_dashboard('index_estudiante',[]);
        }

    }
}