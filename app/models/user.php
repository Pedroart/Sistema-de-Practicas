<?php

namespace app\models;
use core;

class user extends core\modelo{
    public function vericador($correo,$contra)
    {
        $this->table = "users";
        $this->where("user_correo","=", $correo);
        if($this->_num_rows() == 0){
            return false;
        }

        $resultados = $this->first();
        
        if($resultados['user_contra'] == md5($contra)){

            $_SESSION['id_user'] = $resultados['user_role_id'];
            $_SESSION['role'] = $resultados['user_type_role'];

            $this->query("SELECT * FROM `semestre`  WHERE `semestre_id` = (SELECT MAX(`semestre_id`) FROM semestre)");
            $data = $this->first();
            $_SESSION['semestre'] =$data['semestre_nombre'];
            $_SESSION['id_semestre'] =$data['semestre_id'];
            return true;
        }
        return false;
    }
    
    public function Datos_Docentes(){
        $sql = "SELECT `docentes`.*, `personas`.*"
        ."FROM `docentes`"
        .    "LEFT JOIN `personas` ON `docentes`.`user_persona_id` = `personas`.`persona_id`"
        ."WHERE 1";

        $this->query($sql);
        $data = $this->get();
        $formato = function($lista){
            $lista["url"] = "";
            return array_values($lista);
        };
        $datas = array_map($formato,$data);

        return $datas; 
    }

    public function Datos_Alumnos(){
        $sql = "SELECT alumno_codigo, persona_nombres, persona_papellido, persona_mapellido, escuela_nombre FROM `alumnos`\n"

        . "LEFT JOIN personas on personas.persona_id = alumnos.user_persona_id\n"
        . "LEFT JOIN escuelas on escuelas.escuela_id = alumnos.alumnos_escuela\n"
        . "WHERE 1";

        

        $this->query($sql);
        $data = $this->get();
        $formato = function($lista){
            $lista["url"] = "";
            return array_values($lista);
        };
        $datas = array_map($formato,$data);

        return $datas; 
    }

    public function Datos_Alumno($id_alumno){
        $sql = "SELECT * FROM `alumnos`\n"

        . "LEFT JOIN personas on personas.persona_id = alumnos.user_persona_id\n"

        . "LEFT JOIN distritos_pais on distritos_pais.distrito_id = personas.persona_ubi\n"

        . "LEFT JOIN provincias_pais on provincias_pais.provincia_id = distritos_pais.distrito_padre_id\n"
        . "LEFT JOIN escuelas on escuelas.escuela_id = alumnos.alumnos_escuela\n"
        . "LEFT JOIN departamentos_pais on departamentos_pais.departamento_id = provincias_pais.provincia_padre_id\n"
        . "WHERE `alumno_codigo` = '{$id_alumno}';";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function buscar_id_persona_estudiante($id_alumno) {
        $sql = "SELECT `user_persona_id` FROM  `alumnos` WHERE `alumno_codigo` = {$id_alumno}";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function actualizar_DatosSecundarios_Alumno($id,$datos) {
        
        $this->table= "personas";
        return $this->update4key($id,$datos,"persona_id");
    }

    public function actualizarDNI($alumno,$dni){
        
        $sql = "UPDATE `personas` SET `persona_DNI`='{$dni}' WHERE `persona_id`=(SELECT `user_persona_id` FROM `alumnos` WHERE `alumno_codigo` = '{$alumno}')";
        error_log($sql);
        
        $this->query($sql);
    }

    public function crearUsuarios() {
        $data = "";
        if(isset($_FILES)) {
            
            move_uploaded_file($_FILES['archivo_csv']['tmp_name'],__DIREC__.'/app/temporales/'.$_FILES['archivo_csv']['name'] );
            
                

                $file = fopen(__DIREC__.'/app/temporales/'.$_FILES['archivo_csv']['name'], 'r');

                if ($file) {
                    $data_persona = [];
                    $contador = true;
                    while (($row = fgetcsv($file,0,';')) !== false) {
                        if($contador){
                            $contador = false;
                        }else{
                            $data_persona = [
                                "persona_nombres"=>trim($row[4]),
                                "persona_papellido"=>trim($row[5]),
                                "persona_mapellido"=>trim($row[6]),
                            ];
                            $this->table = "personas";
                            $id_persona=$this->create($data_persona);

                            $data_alumno = ["alumno_codigo"=>trim($row[2])
                            //, "alumnos_escuela"=>trim($row[3]), 
                            , "alumnos_escuela"=>10, 
                            "user_persona_id"=>$id_persona];

                            $this->table = "alumnos";
                            $id_alumno=$this->create($data_alumno);


                            $data_usuarios = [
                                "user_correo"=>($row[0]),
                                "user_contra"=>md5($row[1]),
                                "user_type_role"=>3,
                                "user_role_id"=>trim($row[2]),
                                "user_persona_id"=>$id_persona
                            ];

                            $this->table = "users";
                            $id_persona=$this->create($data_usuarios);

                        }

                    }
                    
                    fclose($file);
                    return $data_persona;
                } else {
                    return "No se pudo abrir el archivo.";
                }
            
        }else{
            return "error carga archivo";
        }

    }
    
}