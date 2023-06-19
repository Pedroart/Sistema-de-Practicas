<?php

namespace app\models;

use core;

class lugar extends core\modelo
{
    public function departamentos($id_pais)
    {
        $sql = "SELECT `id_departamento`, `nombre_departamento` FROM `departamento_pais` WHERE `id_pais` = {$id_pais};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
    public function provincia($id_departamento)
    {
        $sql = "SELECT `id_provincia`, `nombre_provincia` FROM `provincia` WHERE `id_departamento`  = {$id_departamento};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
    public function distrito($id_provincia)
    {
        $sql = "SELECT `id_distrito`, `nombre_distrito` FROM `distrito` WHERE `id_provincia` = {$id_provincia};";
        $this->query($sql);
        $data = $this->get();
        return $data;
    }
}
