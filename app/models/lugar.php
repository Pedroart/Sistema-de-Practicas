<?php

namespace app\models;

use core;

class lugar extends core\modelo
{
    public function departamentos($id_pais)
    {
        $sql = "SELECT `departamento_id`, `departamento_nombre` FROM `departamentos_pais` WHERE `departamento_padre_id` = {$id_pais};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
    public function provincia($id_departamento)
    {
        $sql = "SELECT `provincia_id`, `provincia_nombre` FROM `provincias_pais` WHERE `provincia_padre_id`  = {$id_departamento};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
    public function distrito($id_provincia)
    {
        $sql = "SELECT `distrito_id`, `distrito_nombre` FROM `distritos_pais` WHERE `distrito_padre_id` = {$id_provincia};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
}
