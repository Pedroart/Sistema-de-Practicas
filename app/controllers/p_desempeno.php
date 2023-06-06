<?php

namespace app\controllers;
use core;
use app;

class p_desempeno extends core\controller {
    public function index()
    {
        core\view::view_dashboard('desempeno/index',["titulo"=>"Desempeño Laboral"]);
        return;     
    }

    public function proceso($id_etapa_actual){
        $id_proceso = 2;

        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);

        core\view::view_dashboard('efectivas/etapas/'.$id_etapa_actual,["titulo"=>"Proceso","etapas"=>$etapas,"activo"=>$id_etapa_actual,"actual"=>$id_etapa_actual]);
        return;     
    }

    public function proceso_id($id,$actual){
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);
        if($id<=$actual)
        {
        core\view::view_dashboard('efectivas/etapas/'.$id,["titulo"=>"Proceso","etapas"=>$etapas,"activo"=>$id,"actual"=>$actual]);
        return;
        }
        core\view::view_dashboard('efectivas/etapas/0',["titulo"=>"Proceso","etapas"=>$etapas,"activo"=>$id,"actual"=>$actual]);
    }
    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas',["titulo"=>"Cartas"]);
        return;     
    }

    public function estado()
    {
        core\view::view_dashboard('efectivas/estado',["titulo"=>"Estado"]);
        return;     
    }
}