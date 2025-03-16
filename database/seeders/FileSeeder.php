<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::create([
            'path' => '1/FormatoUsuarios.xlsx',
            'rutafile_id' => 1,
        ]);
    }
}
