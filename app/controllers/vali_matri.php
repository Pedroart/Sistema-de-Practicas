<?php

namespace app\controllers;
use core;
use app;

class vali_matri extends core\controller{
    public function index()
    {
        $base = new app\models\matricula();
        core\view::view_dashboard('semestre_matricula',["matricula"=>$base-> vericador(),"Semestre"=>$base->ultimosemestre()]);
        return;     
    }
    
    public function create_(){
        header('Content-type: application/json');
        $base = new app\models\matricula();
        $id = $base->createe();
        echo json_encode( ['resultado'=> true] );
    }
}