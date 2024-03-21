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
                'item' => []
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 2,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Semestre',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['ref'=>'1','atributo'=>'semestre_id']
                    ],
                'item' => []
            ],JSON_FORCE_OBJECT)
        ]);
        Modelador::create([
            'indicador' => 3,
            'tipoproceso_id' => 2,
            'model_type' => 'App\Models\Semestre',
            'json_data' => json_encode([
                'origen' => [
                    'id' => ['set'=>'1']
                    ],
                'item' => []
            ],JSON_FORCE_OBJECT)
        ]);
    }
}
