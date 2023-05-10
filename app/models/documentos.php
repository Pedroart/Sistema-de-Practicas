<?php

namespace app\models;
use core;

class documentos extends core\modelo{
    public function create_files_post($name_post)
    {
        $ficha  = $_FILES[$name_post];
        $nombre = $ficha['name'];
        $nombremd5= md5(date ('Y-m-d H:i:s')).$nombre;
        $tipo   = $ficha['type'];
        $tamano = $ficha['size'];
        $ruta_temporal= $ficha['tmp_name'];
        
        // Mover a los Documentos
        move_uploaded_file($ruta_temporal,__DIREC__.'/public/uploads/' . $nombremd5);
        
        $inset = [ "nombre_documento"=>$nombre, "fecha_documento"=> date ('Y-m-d H:i:s'), "direccion_documento"=>'/public/uploads/' . $nombremd5];
        $this->table = 'documento';
        $id = $this->create($inset);
        return $id;
    }

    public function delete_file($id)
    {
        $this->table = 'documento';
        $data=$this->find($id,"id_documento");
        unlink(__DIREC__.$data["direccion_documento"]);
        return $this->delete($id,"id_documento");
    }
}