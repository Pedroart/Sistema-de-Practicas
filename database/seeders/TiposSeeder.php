<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\Tipoproceso;
use App\Models\Tipoetapa;
use App\Models\Genero;
use App\Models\Modelador;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds_
     *
     * @return void
     */
    public function run()
    {
        $nameEstados = ["Asignado", "Revision", "Finalizado", "Rechazado","Sin asignar"];

        Genero::create(['name' => 'Masculino']);
        Genero::create(['name' => 'Femenino']);

        foreach ($nameEstados as $nameEstado) {
            Estado::create(['name' => $nameEstado]);
        }

        $nameProceso = ["Desempeno", "Efectivas", "Emprendimiento", "Convalidacion"];
        foreach ($nameProceso as $nombre) {
            Tipoproceso::create(['name' => $nombre]);
        }

        $nameEtapasDesempeno = [
            "Carta Presentacion",
            "Datos del jefe inmediato",
            "Constancia o Contrato de trabajo",
            "Boletas de pago",
            "Informe Final"
        ];

        foreach ($nameEtapasDesempeno as $nombre) {
            Tipoetapa::create([
                'name' => $nombre,
                'tipoproceso_id' => 1
            ]);
        }

        $nameEtapasEfectivas = [
            "Carta Presentacion",
            "Carta Aceptacion",
            "Datos del jefe inmediato",
            "Ficha de Actividades",
            "Ficha de control Mensual",
            "Informe Final"
        ];

        foreach ($nameEtapasEfectivas as $nombre) {
            Tipoetapa::create([
                'name' => $nombre,
                'tipoproceso_id' => 2
            ]);
        }

        $modelo2 = [
            [
                "etiqueta_modelo"=> "etapa",
                "modelo_tipo"=> "App\Models\Etapa",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "global",
                        "valor"=> "etapa",
                        "atributo_ref"=> "",
                    ],
                ],
            ],
            [
                "etiqueta_modelo"=> "proceso",
                "modelo_tipo"=> "App\Models\Proceso",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "global",
                        "valor"=> "proceso",
                        "atributo_ref"=> "",
                    ],
                ],
            ],
            [
                "etiqueta_modelo"=> "institucional",
                "modelo_tipo"=> "App\Models\Userinstitucional",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "ref",
                        "valor"=> "proceso",
                        "atributo_ref"=> "estudiante_id",
                    ]
                ]
            ],
            [
                "etiqueta_modelo"=> "persona",
                "modelo_tipo"=> "App\Models\Persona",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "ref",
                        "valor"=> "institucional",
                        "atributo_ref"=> "personas_id",
                    ]
                ]
            ],
            [
                "etiqueta_modelo"=> "user",
                "modelo_tipo"=> "App\Models\User",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "ref",
                        "valor"=> "institucional",
                        "atributo_ref"=> "user_id",
                    ]
                ]
            ],
            [
                "etiqueta_modelo"=> "model_empresa",
                "modelo_tipo"=> "App\Models\Archivo",
                "atributo_busqueda"=>[
                    "proceso_id"=>[
                        "metodo"=> "ref",
                        "valor"=> "proceso",
                        "atributo_ref"=> "id",
                    ],
                    "etiqueta"=>[
                        "metodo"=> "set",
                        "valor"=> "model_empresa",
                        "atributo_ref"=> ""
                    ]
                ]

            ],
            [
                "etiqueta_modelo"=> "empresa_presentante",
                "modelo_tipo"=> "App\Models\Archivo",
                "atributo_busqueda"=>[
                    "proceso_id"=>[
                        "metodo"=> "ref",
                        "valor"=> "proceso",
                        "atributo_ref"=> "id",
                    ],
                    "etiqueta"=>[
                        "metodo"=> "set",
                        "valor"=> "empresa_representante",
                        "atributo_ref"=> ""
                    ]
                ]
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "modelo_tipo"=> "App\Models\Empresa",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "ref",
                        "valor"=> "model_empresa",
                        "atributo_ref"=> "id_model",
                    ]
                ]
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "modelo_tipo"=> "App\Models\Empleado",
                "atributo_busqueda"=> [
                    "id"=>[
                        "metodo"=> "ref",
                        "valor"=> "empresa_presentante",
                        "atributo_ref"=> "id_model",
                    ]
                ]
            ]
        ];
        $items = [
            [
                "etiqueta_modelo"=> "proceso",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_proceso",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "institucional",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_institucional",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "persona",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_persona",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "user",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_user",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "model_empresa",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_model_empresa",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "empresa_presentante",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_empresa_presentante",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_empresa",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "hidden",
                "atributo"=> "id",
                "desplegar"=> "id_empleado",
                "tipo"=> "hidden",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "persona",
                "grupo"=> "Estudiante",
                "atributo"=> "name",
                "desplegar"=> "Nombre",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "persona",
                "grupo"=> "Estudiante",
                "atributo"=> "apellido_paterno",
                "desplegar"=> "Apellido Paterno",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "persona",
                "grupo"=> "Estudiante",
                "atributo"=> "apellido_materno",
                "desplegar"=> "Apellido Materno",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "persona",
                "grupo"=> "Estudiante",
                "atributo"=> "dni",
                "desplegar"=> "DNI",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "institucional",
                "grupo"=> "Institucionales",
                "atributo"=> "codigo",
                "desplegar"=> "Codigo",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "user",
                "grupo"=> "Institucionales",
                "atributo"=> "email",
                "desplegar"=> "Correo",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "institucional",
                "grupo"=> "Institucionales",
                "atributo"=> "escuela_id",
                "desplegar"=> "escuela",
                "tipo"=> "ubiedu",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> ""
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "grupo"=> "Empresa",
                "atributo"=> "ruc",
                "desplegar"=> "RUC",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "grupo"=> "Empresa",
                "atributo"=> "razon_social",
                "desplegar"=> "Razon Social",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "grupo"=> "Empresa",
                "atributo"=> "direccion",
                "desplegar"=> "Direccion",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empresa",
                "grupo"=> "Empresa",
                "atributo"=> "ubidistrito_id",
                "desplegar"=> "UBI",
                "tipo"=> "ubigeo",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "name",
                "desplegar"=> "Nombre",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "apellido_paterno",
                "desplegar"=> "Apellido Paterno",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "apellido_materno",
                "desplegar"=> "Apellido Materno",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "cargo",
                "desplegar"=> "Cargo",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "genero",
                "desplegar"=> "Genero",
                "tipo"=> "selector",
                "selector"=> "App\Models\Genero",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ],
            [
                "etiqueta_modelo"=> "empleado",
                "grupo"=> "Representante Legal",
                "atributo"=> "grado_instruccion",
                "desplegar"=> "Grado de Instrucción",
                "tipo"=> "text",
                "selector"=> "",
                "permiso_ver"=> "estudiante,docente",
                "permiso_editar"=> "estudiante"
            ]
            ];
        Modelador::create([
            "tipoetapa_id"=>1,
            "modelo"                    =>json_encode($modelo2),
            "item"                      =>json_encode($items),
            "dependencia_guardado"      =>"{}",
        ]);
    }
}
