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

class data_efectivas extends core\modelo{

    public function data($id,$estado,&$dataProceso){
        return call_user_func_array(array($this, "data_".$id),array($estado,&$dataProceso));
    }
    public function data_all(&$dataProceso){
        return $this->data_1(1,$dataProceso) + $this->data_2(1,$dataProceso);
    }
    public function data_1($estado,&$dataProceso) {
        $data = [
            "Datos Personales" => [
                ["NameData", "Nombres", "text", "", "readonly"],
                ["NameData", "Apellido Paterno", "text", "", "readonly"],
                ["NameData", "Apellido Materno", "text", "", "readonly"],
                ["NameData", "DNI", "text", "", "readonly"],
                ["NameData", "Semestre", "text", "", "readonly"],
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
            "Documentacion" => [
                ["fecha_inicio", "Fecha Inicio", "date", "", "required"],
                ["fecha_fin", "Fecha Fin", "date", "", "required"],
                ["carta_aceptacion", "Carta de aceptación", "file", ["","value1"], "readonly","file1"],
            ]
            ];
        if($estado>=2){
            $documento = new app\models\documentos;
            $data["Documentacion"][0][3] = $aux["fecha_inicio"];
            $data["Documentacion"][1][3] = $aux["fecha_fin"];
            $data["Documentacion"][2][3] = $documento->get_documento_direc($aux["carta_aceptacion"]);
        }
        return $data;
    }
    
    public function data_9($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["id_empresa"]);
        $dataProceso["id_empresaAlumno"] = $aux["id_empresa_alumno"];
        $data = [
            "Documentacion" => [
                ["DNI", "DNI", "text", "", "readonly"],
                ["correo", "Correo", "mail", "", "required"],
                ["numero", "Celular", "number", "", "required"],
                ["Genero", "Genero", "select", ["femenino"=>"femenino","masculino"=>"masculino"], "required"],
                ["nombre", "Nombres", "text", "", "required"],
                ["apellido_p", "Apellido Paterno", "text", "", "required"],
                ["apellido_m", "Apellido Materno", "text", "", "required"],
                ["GradoInstruccion", "Grado Instruccion", "select", ["ejemplo"=>"Presidente"], "required"],
                ["cargo", "Cargo", "text","", "required"],
            ]
            ];
        
            if($estado>=2){
                $empresa = new app\models\empresa();
                $dataRepresentante=$empresa->get_jefe_empresa($aux["id_jefe_inmediato"]);
                $data["Documentacion"][0][3] = $dataRepresentante["DNI"];
                $data["Documentacion"][1][3] = $dataRepresentante["correo"];
                $data["Documentacion"][2][3] = $dataRepresentante["numero"];
                $data["Documentacion"][3][3] = [""=>$dataRepresentante["Genero"]];
                $data["Documentacion"][4][3] = $dataRepresentante["nombre"];
                $data["Documentacion"][5][3] = $dataRepresentante["apellido_p"];
                $data["Documentacion"][6][3] = $dataRepresentante["apellido_m"];
                $data["Documentacion"][7][3] = [""=>$dataRepresentante["GradoInstruccion"]];
                $data["Documentacion"][8][3] = $dataRepresentante["cargo"];
            }

        return $data;
    }
    
    public function data_3($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["id_empresa"]);
        $dataProceso["id_empresaAlumno"] = $aux["id_empresa_alumno"];

        $data = [
            "Documentacion" => [
                ["Plan_Actividades", "Plan de Actividades", "file", ["","value1"], "readonly","file1"],
            ]
            ];
        if($estado>=2){
            $documento = new app\models\documentos;
            $arrayData = $documento->get_documentos_empresa($aux["id_empresa_alumno"]);
            $documentosTipo1 = array_filter($arrayData, function ($documento) {
                return $documento['Tipo'] === '1';
            });
            echo json_encode($documentosTipo1);
            $data["Documentacion"][0][3] = $documento->get_documento_direc($documentosTipo1[0]["id_documento"]);
        }
        return $data;
    }
    
    public function data_4($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["id_empresa"]);
        $dataProceso["id_empresaAlumno"] = $aux["id_empresa_alumno"];

        $data = [
            "Documentacion" => [
                ["FichaControl1", "Ficha de control Mensual 1", "file", ["","value1"], "readonly","file1"],
                ["FichaControl2", "Ficha de control Mensual 2", "file", ["","value1"], "readonly","file2"],
                ["FichaControl3", "Ficha de control Mensual 3", "file", ["","value1"], "readonly","file3"],
                ["FichaControl4", "Ficha de control Mensual 4", "file", ["","value1"], "readonly","file4"]
            ]
        ];
        if($estado>=2){
            $documento = new app\models\documentos;
            $arrayData = $documento->get_documentos_empresa($aux["id_empresa_alumno"]);
            $documentosTipo1 = array_filter($arrayData, function ($documento) {
                return $documento['Tipo'] === '2';
            });
            echo json_encode($documento->get_documento_direc($documentosTipo1[2]["id_documento"]));
            $data["Documentacion"][0][3] = $documento->get_documento_direc($documentosTipo1[1]["id_documento"]);
            $data["Documentacion"][1][3] = $documento->get_documento_direc($documentosTipo1[2]["id_documento"]);
            $data["Documentacion"][2][3] = $documento->get_documento_direc($documentosTipo1[3]["id_documento"]);
            $data["Documentacion"][3][3] = $documento->get_documento_direc($documentosTipo1[4]["id_documento"]);
        }
        return $data;
    }
    
    public function data_5($estado,&$dataProceso) {
        $empresa = new app\models\empresa();
        $aux = $empresa->get_empresaAlumno($dataProceso["id_empresa"]);
        $dataProceso["id_empresaAlumno"] = $aux["id_empresa_alumno"];

        $data = [
            "Documentacion" => [
                ["Informe_Final", "Plan de Actividades", "file", ["","value1"], "readonly","file1"],
                ["Constancia_Practicas", "Plan de Actividades", "file", ["","value1"], "readonly","file2"],
                
            ]
            ];
            return $data;
    }
}

?>