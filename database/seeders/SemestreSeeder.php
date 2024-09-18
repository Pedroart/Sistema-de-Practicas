<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semestre;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semestre = Semestre::create([
            'name'=>"2024-01",
            'vigencia' => '2024-01-01'
        ]);
        $semestre = Semestre::create([
            'name'=>"2024-02",
            'vigencia' => '2024-05-02'
        ]);
    }
}
