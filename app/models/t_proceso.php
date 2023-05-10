<?php

namespace app\models;
use core;

class t_proceso extends core\modelo{
    public function get_etapas($id_proceso)
    {
        $this->query("SELECT `id_etapa`,`nombre` FROM `tetapas_proceso` WHERE `id_proceso` = ".$id_proceso);
        return $this->get();
    }
}