<?php

namespace Database\Seeders;

use App\Models\Departamentoacademico;
use App\Models\Escuela;
use App\Models\Facultad;
use Illuminate\Database\Seeder;

class FacultadDepartamentoEscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Facultades
        $facultad1 = Facultad::create(['nombre' => 'Facultad de Derecho y Ciencias Políticas']);
        $facultad2 = Facultad::create(['nombre' => 'Facultad de Ciencias Sociales']);
        $facultad3 = Facultad::create(['nombre' => 'Facultad de Ciencias Empresariales']);
        $facultad4 = Facultad::create(['nombre' => 'Facultad de Ciencias Económicas, Contables y Financieras']);
        $facultad5 = Facultad::create(['nombre' => 'Facultad de Medicina Humana']);
        $facultad6 = Facultad::create(['nombre' => 'Facultad de Bromatología y Nutrición']);
        $facultad7 = Facultad::create(['nombre' => 'Facultad de Educación']);
        $facultad8 = Facultad::create(['nombre' => 'Facultad de Ingeniería Industrial, Sistemas e Informática']);
        $facultad9 = Facultad::create(['nombre' => 'Facultad de Ingeniería Civil']);
        $facultad10 = Facultad::create(['nombre' => 'Facultad de Ingeniería Química y Metalúrgica']);
        $facultad11 = Facultad::create(['nombre' => 'Facultad de Ingeniería Agraria, Industrias Alimentarias y Ambiental']);
        $facultad12 = Facultad::create(['nombre' => 'Facultad de Ingeniería Pesquera']);
        $facultad13 = Facultad::create(['nombre' => 'Facultad de Ciencias']);

        // Crear Departamentos Académicos
        // Crear Departamentos Académicos
        $departamento1 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Derecho y Ciencias Políticas']);
        $departamento2 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ciencias Sociales y Comunicación']);
        $departamento3 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Administración y Gestión']);
        $departamento4 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Economía y Finanzas']);
        $departamento5 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ciencias Contables y Financieras']);
        $departamento6 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Medicina Humana']);
        $departamento7 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Enfermería']);
        $departamento8 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Bromatología y Nutrición']);
        $departamento9 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ciencias de la Educación y Tecnología Educativa']);
        $departamento10 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ciencias Sociales y Humanidades']);
        $departamento11 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ciencias Formales y Naturales']);
        $departamento12 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería Industrial']);
        $departamento13 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería de Sistemas, Informática y Electrónica']);
        $departamento14 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería Civil']);
        $departamento15 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería Química y Metalúrgica']);
        $departamento16 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Agronomía']);
        $departamento17 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Zootecnia']);
        $departamento18 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería en Industrias Alimentarias']);
        $departamento19 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Ingeniería Pesquera e Ingeniería Acuícola']);
        $departamento20 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Matemática y Estadística']);
        $departamento21 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Física']);
        $departamento22 = Departamentoacademico::create(['nombre' => 'Departamento Académico de Biología']);

        // Asociar Departamentos a Facultades
        $facultad1->departamentos()->saveMany([$departamento1]);
        $facultad2->departamentos()->saveMany([$departamento2]);
        $facultad3->departamentos()->saveMany([$departamento3]);
        $facultad4->departamentos()->saveMany([$departamento4, $departamento5]);
        $facultad5->departamentos()->saveMany([$departamento6, $departamento7]);
        $facultad6->departamentos()->saveMany([$departamento8]);
        $facultad7->departamentos()->saveMany([$departamento9, $departamento10, $departamento11]);
        $facultad8->departamentos()->saveMany([$departamento12, $departamento13]);
        $facultad9->departamentos()->saveMany([$departamento14]);
        $facultad10->departamentos()->saveMany([$departamento15]);
        $facultad11->departamentos()->saveMany([$departamento16, $departamento17, $departamento18]);
        $facultad12->departamentos()->saveMany([$departamento19]);
        $facultad13->departamentos()->saveMany([$departamento20, $departamento21, $departamento22]);

        // Crear Escuelas
        // Crear Escuelas
        $escuela1 = Escuela::create(['nombre' => 'Escuela Profesional de Derecho y Ciencias Políticas']);
        $escuela2 = Escuela::create(['nombre' => 'Escuela Profesional de Trabajo Social']);
        $escuela3 = Escuela::create(['nombre' => 'Escuela Profesional de Sociología']);
        $escuela4 = Escuela::create(['nombre' => 'Escuela Profesional de Ciencias de la Comunicación']);
        $escuela5 = Escuela::create(['nombre' => 'Escuela Profesional de Administración']);
        $escuela6 = Escuela::create(['nombre' => 'Escuela Profesional de Negocios Internacionales']);
        $escuela7 = Escuela::create(['nombre' => 'Escuela Profesional de Gestión en Turismo y Hotelería']);
        $escuela8 = Escuela::create(['nombre' => 'Escuela Profesional de Ciencias Contables y Financieras']);
        $escuela9 = Escuela::create(['nombre' => 'Escuela Profesional de Economía y Finanzas']);
        $escuela10 = Escuela::create(['nombre' => 'Escuela Profesional de Medicina Humana']);
        $escuela11 = Escuela::create(['nombre' => 'Escuela Profesional de Enfermería']);
        $escuela12 = Escuela::create(['nombre' => 'Escuela Profesional de Bromatología y Nutrición']);
        $escuela13 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Tecnológica']);
        $escuela14 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Inicial']);
        $escuela15 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Primaria']);
        $escuela16 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Secundaria']);
        $escuela17 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Semiescolarizada']);
        $escuela18 = Escuela::create(['nombre' => 'Escuela Profesional de Educación Física y Deportes']);
        $escuela19 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Industrial']);
        $escuela20 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería de Sistemas']);
        $escuela21 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Informática']);
        $escuela22 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Electrónica']);
        $escuela23 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Civil']);
        $escuela24 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Metalúrgica']);
        $escuela25 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Química']);
        $escuela26 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Agronómica']);
        $escuela27 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Ambiental']);
        $escuela28 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Zootécnica']);
        $escuela29 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería en Industrias Alimentarias']);
        $escuela30 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Pesquera']);
        $escuela31 = Escuela::create(['nombre' => 'Escuela Profesional de Ingeniería Acuícola']);
        $escuela32 = Escuela::create(['nombre' => 'Escuela Profesional de Estadística e Informática']);
        $escuela33 = Escuela::create(['nombre' => 'Escuela Profesional de Matemática Aplicada']);
        $escuela34 = Escuela::create(['nombre' => 'Escuela Profesional de Física']);
        $escuela35 = Escuela::create(['nombre' => 'Escuela Profesional de Biología con mención en Biotecnología']);

        // Asociar Escuelas a Departamentos Académicos
        $departamento1->escuelas()->saveMany([$escuela1]);
        $departamento2->escuelas()->saveMany([$escuela2, $escuela3, $escuela4]);
        $departamento3->escuelas()->saveMany([$escuela5, $escuela6, $escuela7]);
        $departamento4->escuelas()->saveMany([$escuela8]);
        $departamento5->escuelas()->saveMany([$escuela9]);
        $departamento6->escuelas()->saveMany([$escuela10]);
        $departamento7->escuelas()->saveMany([$escuela11]);
        $departamento8->escuelas()->saveMany([$escuela12]);
        $departamento9->escuelas()->saveMany([$escuela13]);
        $departamento10->escuelas()->saveMany([$escuela14, $escuela15, $escuela16, $escuela17]);
        $departamento11->escuelas()->saveMany([$escuela18]);
        $departamento12->escuelas()->saveMany([$escuela19]);
        $departamento13->escuelas()->saveMany([$escuela20, $escuela21, $escuela22]);
        $departamento14->escuelas()->saveMany([$escuela23]);
        $departamento15->escuelas()->saveMany([$escuela24, $escuela25]);
        $departamento16->escuelas()->saveMany([$escuela26, $escuela27]);
        $departamento17->escuelas()->saveMany([$escuela28]);
        $departamento18->escuelas()->saveMany([$escuela29]);
        $departamento19->escuelas()->saveMany([$escuela30, $escuela31]);
        $departamento20->escuelas()->saveMany([$escuela32, $escuela33]);
        $departamento21->escuelas()->saveMany([$escuela34]);
        $departamento22->escuelas()->saveMany([$escuela35]);

    }
}
