<?php

namespace app\models;
use core;

class t_proceso extends core\modelo{
    public function get_etapas($id_proceso)
    {
        $this->query("SELECT `tetp_id_etapa`,`tetp_nombre` FROM `tetapas_proceso` WHERE `tetp_id_proceso` = ".$id_proceso);
        return $this->get();
    }
}