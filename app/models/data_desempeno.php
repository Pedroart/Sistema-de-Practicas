<?php

/*
$formulario = [
    "Titulo" => [
        ["NameData", "Name_Input", "file", "", "required"],
        ["NameData", "Name_Input", "number", "", "readonly"],
        
                ["NameData", "Semestre", "file", ["","value1"], "readonly","file1"],
    ],
    "Titulo2" => [
        ["NameData", "Name_Input", "text", "", "required"],
        ["NameData", "Name_Input", "mail", "", "required"],
    ]
    ,
    "Titulo3" => [
        ["NameData", "Name_Input", "textarea", "", "required"]
    ]
]
*/

namespace app\models;
use core;
use app;

class data_desempeno extends core\modelo{

    public function data($id,$estado,&$dataProceso){
        return call_user_func_array(array($this, "data_".$id),array($estado,&$dataProceso));
    }
    public function data_all(&$dataProceso){
        $info = [];
            if ($dataProceso["proceso_etapa"]>1){ $info +=$this->data_7(3,$dataProceso);}
            if ($dataProceso["proceso_etapa"]>2){ $info +=$this->data_2(3,$dataProceso);}
            if ($dataProceso["proceso_etapa"]>3){ $info +=$this->data_3(3,$dataProceso);}
            if ($dataProceso["proceso_etapa"]>4){ $info +=$this->data_4(3,$dataProceso);}
            if ($dataProceso["proceso_etapa"]>5){ $info +=$this->data_5(3,$dataProceso);}
            if ($dataProceso["proceso_etapa"]==6){ $info +=$this->data_6(3,$dataProceso);}
        return $info;
        //return $this->data_1(3,$dataProceso) + $this->data_2(3,$dataProceso);
    }
    public function data_7($estado,&$dataProceso) {
        $data = [
            "Datos Personales" => [
                ["NameData", "Nombres", "text", "", "disabled"],
                ["NameData", "Apellido Paterno", "text", "", "disabled"],
                ["NameData", "Apellido Materno", "text", "", "disabled"],
                ["NameData", "DNI", "text", "", "disabled"],
                ["NameData", "Semestre", "text", "", "disabled"],
            ],
            "Datos del Estudiante" => [
                ["direccion", "Direccion", "text", "", "required"],
                ["correo", "Correo", "mail", "", "required"],
                ["celular", "Celular", "number", "", "required"],
                ["departamento", "Departamento", "select", [], "required","Departamento1"],
                ["provincia", "Provincia", "select", [], "required","Provincia1"],
                ["distrito", "Distrito", "select", [], "required","Distrito1"],
            ],
            "Datos del Centro de Practicas" => [
                ["RUC", "RUC", "text", "", "required"],
                ["Razon_socal_empresa", "Nombre Empresa", "text", "", "required"],
                ["Referencia_ubicacion_empresa", "Direccion", "text", "", "required"],
                ["NameData", "Departamento", "select", [], "required","Departamento2"],
                ["NameData", "Provincia", "select", [], "required","Provincia2"],
                ["id_distrito", "Distrito", "select", [], "required","Distrito2"],

            ],
            "Datos del Representante" => [
                ["Genero", "Genero", "select", ["femenino"=>"femenino","masculino"=>"masculino"], "required"],
                ["nombre", "Nombres", "text", "", "required"],
                ["apellido_p", "Apellido Paterno", "text", "", "required"],
                ["apellido_m", "Apellido Materno", "text", "", "required"],
                ["GradoInstruccion", "Grado Instruccion", "select", ["Presidente"=>"Presidente","CCO"=>"CCO"], "required"],
                ["cargo", "Cargo", "text","", "required"],
            ]

            ];
        
            $user = new app\models\user();
            $dataEstudiante = $user->Datos_Alumno($dataProceso["procesos_alumno"]);
            
            $data["Datos Personales"][0][3]=$dataEstudiante["persona_nombres"];
            $data["Datos Personales"][1][3]=$dataEstudiante["persona_papellido"];
            $data["Datos Personales"][2][3]=$dataEstudiante["persona_mapellido"];
            $data["Datos Personales"][3][3]=$dataEstudiante["persona_DNI"];
            $data["Datos Personales"][4][3]=$_SESSION['semestre'];

        if($estado>=2){
            
            
            $data["Datos del Estudiante"][0][3]=$dataEstudiante["persona_direccion"];
            $data["Datos del Estudiante"][1][3]=$dataEstudiante["persona_correo"];
            $data["Datos del Estudiante"][2][3]=$dataEstudiante["persona_celular"];
            $data["Datos del Estudiante"][3][3]=[""=>$dataEstudiante["departamento_nombre"]];
            $data["Datos del Estudiante"][4][3]=[$dataEstudiante["provincia_id"]=>$dataEstudiante["provincia_nombre"]];
            $data["Datos del Estudiante"][5][3]=[$dataEstudiante["distrito_id"]=>$dataEstudiante["distrito_nombre"]];

            $empresa = new app\models\empresa();
            
            $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
            
            $dataEmpresa = $empresa->get_empresa_datos($aux["empresa_datos"])[0];
            
            $data["Datos del Centro de Practicas"][0][3] = $dataEmpresa["empresa_RUC"];
            $data["Datos del Centro de Practicas"][1][3]= $dataEmpresa["empresa_razon_social"];
            $data["Datos del Centro de Practicas"][2][3]= $dataEmpresa["empresa_direcion"];
            $data["Datos del Centro de Practicas"][3][3]= ["1"=>$dataEmpresa["departamento_nombre"]];
            $data["Datos del Centro de Practicas"][4][3]= ["1"=>$dataEmpresa["provincia_nombre"]];
            $data["Datos del Centro de Practicas"][5][3]= ["1"=>$dataEmpresa["distrito_nombre"]];
            
            $dataRepresentate = $empresa->get_representante_empresa($aux["empresa_representante"]);
            
            $data["Datos del Representante"][0][3]= ["1"=>$dataRepresentate["encargado_genero"]];
            $data["Datos del Representante"][1][3]=$dataRepresentate["encargado_nombres"];
            $data["Datos del Representante"][2][3]=$dataRepresentate["encargado_papellido"];
            $data["Datos del Representante"][3][3]=$dataRepresentate["encargado_mapellido"];
            $data["Datos del Representante"][4][3]=["1"=>$dataRepresentate["encargado_grado_instruccion"]];
            $data["Datos del Representante"][5][3]=$dataRepresentate["encargado_cargo"];
        }

        return $data;
    }
    
    public function data_2($estado,&$dataProceso) {

        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
        

        $data = [
            "Carta de Aceptacion" => [
                ["fecha_inicio", "Fecha Inicio", "date", "", "required"],
                ["fecha_fin", "Fecha Fin", "date", "", "required"],
                ["carta_aceptacion", "Carta de aceptación", "file", ["","value1"], "readonly","file1"],
            ]
            ];
        if($estado>=2){
            $documento = $empresa->getDocumento($dataProceso["procesos_id"],3);
            $data["Carta de Aceptacion"][0][3] = $aux["empresa_fecha_inicio"];
            $data["Carta de Aceptacion"][1][3] = $aux["empresa_fecha_fin"];
            $data["Carta de Aceptacion"][2][3] = ["uri"=>$documento["documente_direc"],"comentario"=>""];
        }
        return $data;
    }
    
    public function data_3($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
        
        $data = [
            "Datos del Representante" => [
                ["encargado_dni", "DNI", "text", "", "required"],
                ["encargado_genero", "Genero", "select", ["femenino"=>"femenino","masculino"=>"masculino"], "required"],
                ["encargado_nombres", "Nombres", "text", "", "required"],
                ["encargado_papellido", "Apellido Paterno", "text", "", "required"],
                ["encargado_mapellido", "Apellido Materno", "text", "", "required"],
                ["encargado_grado_instruccion", "Grado Instruccion", "select", ["Presidente"=>"Presidente","CCO"=>"CCO"], "required"],
                ["encargado_cargo", "Cargo", "text","", "required"],
                ["encargado_correo", "Correo", "mail", "", "required"],
                ["encargado_celular", "Celular", "number", "", "required"] 
            ]
            ];
        
            if($estado>=2){
                $dataRepresentate = $empresa->get_representante_empresa($aux["empresa_jefe_inmediato"]);
                error_log(  json_encode( $dataRepresentate) );
                $data["Datos del Representante"][0][3] = $dataRepresentate["encargado_dni"];
                $data["Datos del Representante"][1][3] = ["1"=>$dataRepresentate["encargado_genero"]];
                $data["Datos del Representante"][2][3] = $dataRepresentate["encargado_nombres"];
                $data["Datos del Representante"][3][3] = $dataRepresentate["encargado_papellido"];
                $data["Datos del Representante"][4][3] = $dataRepresentate["encargado_mapellido"];
                $data["Datos del Representante"][5][3] = ["1"=>$dataRepresentate["encargado_grado_instruccion"]];
                $data["Datos del Representante"][6][3] = $dataRepresentate["encargado_cargo"];
                $data["Datos del Representante"][7][3] = $dataRepresentate["encargado_correo"];
                $data["Datos del Representante"][8][3] = $dataRepresentate["encargado_celular"];

            }

        return $data;
    }
    
    public function data_4($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);

        $data = [
            "Plan de Actividades" => [
                ["Plan_Actividades", "Plan de Actividades", "file", ["","value1"], "readonly","file1"],
            ]
            ];
        if($estado>=2){
            
            $documento = $empresa->getDocumento($dataProceso["procesos_id"],1);
            $data["Plan de Actividades"][0][3] = ["uri"=>$documento["documente_direc"],"comentario"=>""];
        }
        return $data;
    }
    
    public function data_5($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
        

        $data = [
            "Control Mensual" => [
                ["FichaControl1", "Ficha de control Mensual 1", "file", ["","value1"], "readonly","file1"],
                ["FichaControl2", "Ficha de control Mensual 2", "file", ["","value1"], "readonly","file2"],
                ["FichaControl3", "Ficha de control Mensual 3", "file", ["","value1"], "readonly","file3"],
                ["FichaControl4", "Ficha de control Mensual 4", "file", ["","value1"], "readonly","file4"]
            ]
        ];
        if($estado>=2){
            $documento = $empresa->getDocumentos($dataProceso["procesos_id"],2);
            
            $data["Control Mensual"][0][3] = ["uri"=>$documento[0]["documente_direc"],"comentario"=>""];
            $data["Control Mensual"][1][3] = ["uri"=>$documento[1]["documente_direc"],"comentario"=>""];
            $data["Control Mensual"][2][3] = ["uri"=>$documento[2]["documente_direc"],"comentario"=>""];
            $data["Control Mensual"][3][3] = ["uri"=>$documento[3]["documente_direc"],"comentario"=>""];
        }
        return $data;
    }
    
    public function data_6($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
        

        $data = [
            "Documentacion Final" => [
                ["Informe_Final", "Informe Final", "file", ["","value1"], "readonly","file1"],
                ["Constancia_Practicas", "Constancia Practicas", "file", ["","value1"], "readonly","file2"],
            ]
        ];
        
        if($estado>=2){
            $documento = $empresa->getDocumento($dataProceso["procesos_id"],5);
            $data["Documentacion Final"][0][3] = ["uri"=>$documento["documente_direc"],"comentario"=>""];
            $documento = $empresa->getDocumento($dataProceso["procesos_id"],6);
            $data["Documentacion Final"][1][3] = ["uri"=>$documento["documente_direc"],"comentario"=>""];
        }
        
        return $data;
    }
}

?>