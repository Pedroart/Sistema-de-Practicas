<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\Tipoproceso;
use App\Models\Tipoetapa;
use App\Models\Modelador;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameEstados = ["Asignado", "Revision", "Finalizado", "Rechazado","Sin asignar"];

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

        Modelador::create([
            'indicador' => 1,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Proceso',
            'json_data' => json_encode([
                'origen' => [
                    'id'=>['global'=>'proceso']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.view',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 2,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Userinstitucional',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'1','atributo'=>'estudiante_id']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.view',
                            'docente.view'
                        ]
                    ],
                    'codigo'=>[
                        'grupo' => 'Datos del Estudiante',
                        'display' => 'codigo',
                        'type' => 'text',
                        'permiso' => [
                            'estudiante.view',
                            'docente.view'
                        ]
                    ],
                    'escuela_id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'ubiedu',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 3,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Persona',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'2','atributo'=>'personas_id']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 4,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\User',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'2','atributo'=>'user_id']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 5,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Archivo',
            'json_data' => json_encode([
                'origen' => [
                    'proceso_id' => ['ref'=>'1','atributo'=>'id'],
                    'etiqueta' => ['set'=>'class.empresa']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 6,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Empresa',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'5','atributo'=>'id_model'],
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 7,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Archivo',
            'json_data' => json_encode([
                'origen' => [
                    'proceso_id' => ['ref'=>'1','atributo'=>'id'],
                    'etiqueta' => ['set'=>'empleado.representante']
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 8,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Empleado',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'7','atributo'=>'id_model'],
                    ],
                'item' => [
                    'id'=>[
                        'grupo' => 'hidden',
                        'display' => '',
                        'type' => 'hidden',
                        'permiso' => [
                            'estudiante.edit',
                            'estudiante.view',
                            'docente.edit',
                            'docente.view'
                        ]
                    ]
                ]
            ],JSON_FORCE_OBJECT)
        ]);
    }
}
