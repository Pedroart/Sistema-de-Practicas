<?php

namespace app\models;
use core;

class comentarios extends core\modelo{
    public function createComentario($idRole, $idUser, $cuerpo){
        $insert = [
            "id_role" => $idRole,
            "id_user" => $idUser,
            "cuerpo" => $cuerpo,
            "fecha" => date('Y-m-d')
        ];
        
        $this->table = 'comentario';
        $id = $this->create($insert);
        
        return $id;
    }
}