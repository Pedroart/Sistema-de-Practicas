<?php

namespace app\controllers;
use core;
use app;

class p_efectiva extends core\controller {
    public function index()
    {
        core\view::view_dashboard('efectivas/index',[]);
        return;     
    }

    public function pre_proceso($id_alumno){
        $model = new app\models\proceso();
        $data = $model -> buscarProcesos($id_alumno);
        if($model ->_num_rows() == 0){
            return false;
        }
        return $data;
    }

    public function proceso(){
        $id_proceso = 1;

        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);

        core\view::view_dashboard('efectivas/etapas/9',["etapas"=>$etapas]);
        return;     
    }

    public function proceso_id($id){
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);

        core\view::view_dashboard('efectivas/etapas/'.$id,["etapas"=>$etapas,"activo"=>$id,"actual"=>9]);
        return;     
    }
    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas',[]);
        return;     
    }
}
