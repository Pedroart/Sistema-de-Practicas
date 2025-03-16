<?php

namespace Database\Seeders;

use App\Models\Rutafile;
use Illuminate\Database\Seeder;

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
