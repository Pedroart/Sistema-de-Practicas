<?php

namespace app\models;

use core;

class empresa extends core\modelo
{
    public function crear($data) {
        $this->table="empresa";
        return $this->create($data);
    }
    public function crear_representante_empresa($data){
        $this->table="empresa_encargados";
        return $this->create($data);
    }
    public function crear_empresa_alumno($data){
        $this->table="empresa_alumno";
        return $this->create($data);
    }
}