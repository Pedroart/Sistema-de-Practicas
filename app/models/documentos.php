<?php

namespace app\models;
use core;

class documentos extends core\modelo{
    public function crear_empresa_documento($id_documento,$id_empresa_alumno,$tipo) {
        $inset = [
            "id_documento"=>$id_documento,
            "id_empresa_alumno"=>$id_empresa_alumno,
            "Tipo"=>$tipo
        ];
        $this->table = "empresa_documentos";
        $id = $this->create($inset);
        return $id;
    }

    public function create_files_post($name_post,$tipe)
    {
        $ficha  = $_FILES[$name_post];
        $nombre = $ficha['name'];
        $nombremd5= md5(date ('Y-m-d H:i:s')).$nombre;
        $tipo   = $ficha['type'];
        $tamano = $ficha['size'];
        $ruta_temporal= $ficha['tmp_name'];
        
        if(!($tipo == $tipe)){
            return null;
        }

        // Mover a los Documentos
        move_uploaded_file($ruta_temporal,__DIREC__.'/public/uploads/' . $nombremd5);
        
        $inset = [ "nombre_documento"=>$nombre, "fecha_documento"=> date ('Y-m-d H:i:s'), "direccion_documento"=>'/public/uploads/' . $nombremd5];
        $this->table = 'documento';
        $id = $this->create($inset);
        return $id;
    }

    public function agregar_comentario($id,$id_comentario)
    {
        $this->update($id,[
            "comentario"=>$id_comentario
        ]);
    }

    public function delete_file($id)
    {
        $this->table = 'documento';
        $data=$this->find($id,"id_documento");
        $this->delete($id,"id_documento");
        unlink(__DIREC__.$data["direccion_documento"]);
        return true;
    }

    public function get_documento_direc($id){
        if(is_null($id)){
            return [];
        }

        $this->table = 'documento';
        $data =$this->find($id,"id_documento");
        return ["uri"=>$data["direccion_documento"],"comentario"=>$data["comentario"]];
    }
}