<?php
namespace app\controllers;

use core;

class home extends core\controller{
    static public function display(){
        
        if ($_SESSION['role'] == "3"){
            view_dashboard('index_admin',[]);
        }elseif ($_SESSION['role'] == "2") {
            view_dashboard('index_docente',[]);
        }elseif ($_SESSION['role'] == "1") {
            view_dashboard('index_estudiante',[]);
        }

    }
}