<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RutaFile;

class RutaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RutaFile::create([
            'name' => 'documento_oficiales',
        ]);
        RutaFile::create([
            'name' => 'archivo_alumnos',
        ]);
    }
}
