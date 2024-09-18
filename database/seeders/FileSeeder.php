<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\File;


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
