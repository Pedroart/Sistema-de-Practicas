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
    
    public function get_name_empresa($id_proceso){
        $sql = "SELECT empresa.Razon_socal_empresa, empresa_alumno.id_empresa_alumno, empresa_alumno.id_empresa\n"
        . "FROM `proceso` \n"
        . "LEFT JOIN empresa_alumno ON proceso.id_empresa = empresa_alumno.id_empresa_alumno\n"
        . "LEFT JOIN empresa On empresa_alumno.id_empresa = empresa.id_empresa\n"
        . "WHERE `id`={$id_proceso};";
        $this->query($sql);
        $data = $this->first();

        return $data;
    }

    public function get_empresa($id) {
        $sql = "SELECT empresa_alumno.id_empresa_alumno, empresa.RUC as ruc, empresa.Razon_socal_empresa as nombre, empresa.Referencia_ubicacion_empresa as direc, departamento_pais.nombre_departamento as departamento, provincia.nombre_provincia as provincia, distrito.nombre_distrito as distrito\n"
        . "FROM empresa \n"
        . "left JOIN empresa_alumno on empresa.id_empresa = empresa_alumno.id_empresa\n"
        . "left JOIN  distrito on empresa.id_distrito = distrito.id_distrito\n"
        . "LEFT JOIN provincia on distrito.id_provincia = provincia.id_provincia\n"
        . "LEFT JOIN departamento_pais on provincia.id_departamento = departamento_pais.id_departamento\n"
        . "WHERE empresa_alumno.id_empresa_alumno = {$id};";
        $this->query($sql);
        $data = $this->get();

        return $data;
    }
    public function get_jefe_empresa($id){
        $sql = "SELECT * FROM `empresa_encargados` WHERE `id_empresa_encargado` = {$id};";
        $this->query($sql);
        $data = $this->first();

        return $data;
    }

    public function get_representante_empresa($id){
        $sql = "SELECT `Genero`, `nombre`, `apellido_p`, `apellido_m`, `GradoInstruccion`, `cargo` \n"
        . "FROM `empresa_encargados`\n"
        . "LEFT JOIN empresa_alumno on empresa_encargados.id_empresa_encargado = empresa_alumno.id_representante\n"
        . "WHERE `id_puesto`=1 and  empresa_alumno.id_empresa_alumno={$id};";

        $this->query($sql);
        $data = $this->get();

        return $data;
    }

    public function update_empres_alumno($id,$data){
        $this->table = "empresa_alumno";
        $this->update4key($id,$data,"id_empresa_alumno");
    }

    public function get_empresaAlumno($id){
        $sql = "SELECT * FROM `empresa_proceso`\n"
        . "WHERE `empresa_proceso` = {$id};";
        $this->query($sql);
        $data = $this->first();

        return $data;
    }
    public function get_empresaAlumno_idEmpresa($id){
        $sql = "SELECT * FROM `empresa_alumno` WHERE `id_empresa` = {$id};";
        $this->query($sql);
        $data = $this->first();

        return $data;
    }
}