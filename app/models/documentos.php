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
        $nombremd5= md5(date ('Y-m-d H:i:s')).mt_rand(1,10).$nombre;
        $tipo   = $ficha['type'];
        $tamano = $ficha['size'];
        $ruta_temporal= $ficha['tmp_name'];
        
        if(!($tipo == $tipe)){
            return null;
        }

        // Mover a los Documentos
        move_uploaded_file($ruta_temporal,__DIREC__.'/public/uploads/' . $nombremd5);
        
        $inset = [ "documento_nombre"=>$nombre, "documento_fecha"=> date ('Y-m-d H:i:s'), "documente_direc"=>'/public/uploads/' . $nombremd5];
        $this->table = 'documentos';
        $id = $this->create($inset);
        return $id;
    }

    public function agregar_comentario($id,$id_comentario)
    {
        $this->table = 'documentos';
        $this->update4key($id,["documento_comentario"=>$id_comentario],"documento_id");
    }

    public function delete_file($id)
    {
        $this->table = 'documentos';
        $data=$this->find($id,"documento_id");
        $this->delete($id,"documento_id");
        unlink(__DIREC__.$data["documente_direc"]);
        return true;
    }

    public function get_documento_direc($id){
        if(is_null($id)){
            return [];
        }

        $sql = "SELECT * FROM `documentos`\n"
        . "INNER JOIN comentarios ON comentarios.comentario_id = documentos.documento_comentario\n"
        . "WHERE `documento_id`={$id};";
        $this->query($sql);
        if($this->_num_rows() == 0){
            $sql = "SELECT * FROM `documentos`\n"
        . "WHERE `documento_id`={$id};";
        $this->query($sql);
        }

        
        $data = $this->get()[0];

        if(!isset($data["comentario_cuerpo"])){
            $data["comentario_cuerpo"] = "";
        }

        return ["uri"=>$data["documente_direc"],"comentario"=>$data["comentario_cuerpo"]];
    }

    public function get_documentos_empresa($id_empresa_alumno){
        $this->table = "empresa_documentos";
        $data =$this-> where("id_empresa_alumno","=",$id_empresa_alumno);
        return $this->get();
    }
}