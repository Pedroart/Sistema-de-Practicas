<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;
use App\Models\Etapa;


class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Desempeno = Proceso::create([
            'docente_id'=>5,
            'estudiante_id'=>1,
            'semestre_id'=>1,
            'estado_id'=>1,
            'tipoproceso_id'=>1,
        ]);

        $etapas = Etapa::create([
            'proceso_id'=>$Desempeno->id,
            'tipoetapas_id'=>1,
            'estado_id'=>3,
        ]);
    }
}
