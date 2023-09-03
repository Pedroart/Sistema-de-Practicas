<?php

namespace app\controllers;
use core;
use app;

class vali_matri extends core\controller{
    public function index()
    {
        $base = new app\models\matricula();
        core\view::view_dashboard('semestre_matricula',["titulo"=>"","matricula"=>$base-> vericador(),"Semestre"=>$_SESSION['semestre'],"data"=>$base->get_documentes_comentarios($_SESSION['id_user'])]);
        return;     
    }
    
    public function create_(){
        header('Content-type: application/json');
        $base = new app\models\matricula();
        $id = $base->createe();
        $persona = new app\models\user();
        $persona->actualizarDNI($_SESSION['id_user'],$_POST["nDNI"]);
        echo json_encode( ['resultado'=> $id] );
    }
    public function updateFile_(){
        
        $base = new app\models\matricula();
        $base->delet_PDFs();
        
    }
}