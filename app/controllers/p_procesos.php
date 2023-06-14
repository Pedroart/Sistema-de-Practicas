<?php

namespace app\controllers;
use core;
use app;

class p_procesos extends core\controller {
    public function index()
    {
        $base = new app\models\proceso();
        
        core\view::view_dashboard("table_procesos",["titulo"=>"","data"=>$base->get_tabla()]);
        return;
    }
    public function edit($id){
        $base = new app\models\proceso();
        $data=$base->getProceso($id);
        echo json_encode($data);
        core\view::view_dashboard("procesos/".$data["id_etapa"],["titulo"=>"","data"=>$data]);
        return;
    }
}
