<?php

namespace app\models;
use core;

class proceso extends core\modelo{
    public function buscarProcesos($id_alumno)
    {
        $sql = "SELECT `id`,`id_proceso` FROM `proceso` WHERE `id_alumno` = 1 and `id_semestre` = (SELECT MAX(`id_semestres`)FROM `semestres`)";
        $this->query($sql);
        return $this->get();
    }
}