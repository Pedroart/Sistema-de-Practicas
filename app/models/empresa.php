<?php

namespace app\models;

use core;

class empresa extends core\modelo
{
    public function crear_data($data) {
        $this->table="empresas_datos";
        return $this->create($data);
    }
    public function crear_representante_empresa($data){
        $this->table="empresa_encargado";
        return $this->create($data);
    }
    public function crear_empresa_alumno($data){
        $this->table="empresa_proceso";
        return $this->create($data);
    }
    
    public function actualizar_estado($id,$data){
        $this->table ="empresa_proceso";
        $this->update4key($id,$data,"empresa_proceso_id");
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

    public function get_empresa_datos($id){
        $sql = "SELECT * FROM `empresas_datos` \n"

        . "LEFT JOIN distritos_pais on distritos_pais.distrito_id = empresas_datos.empresa_ubi\n"

        . "LEFT JOIN provincias_pais on provincias_pais.provincia_id = distritos_pais.distrito_padre_id\n"

        . "LEFT JOIN departamentos_pais on departamentos_pais.departamento_id = provincias_pais.provincia_padre_id\n"

        . "WHERE `empresa_id` = {$id};";
        $this->query($sql);
        $data = $this->get();

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
        $this->table = "empresa_encargado";
    
        return $this->find($id,"encargado_id");
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
    public function cadenaBorrado1($id) {
        $data_empresa_proceso = $this->get_empresaAlumno($id);
        $this->table="empresa_proceso";
        $this->delete($id,"empresa_proceso_id");
        $this->table="empresa_encargado";
        $this->delete($data_empresa_proceso["empresa_representante"],"encargado_id");
        $this->table="empresas_datos";
        $this->delete($data_empresa_proceso["empresa_datos"],"empresa_id");
    }
}