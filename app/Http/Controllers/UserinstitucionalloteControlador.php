<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\InstitucionalUser;

class UserinstitucionalloteControlador extends Controller
{
    use InstitucionalUser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = [
            "administrador"=>"administrador",
            "director facultad"=>"director facultad",
            "director academico"=>"director academico",
            "director escuela"=>"director escuela",
            "docente"=>"docente",
            "asistente docencia"=>"asistente docencia",
            "estudiante"=>"estudiante"
        ];
        return view('userinstitucional.lote.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:csv,txt',
            'conformidad' => 'required|accepted',
        ]);

        // Leer el archivo CSV

        $muestra = [
            0 => "",
            1 => "",
            2 => "",
            3 => "",
            4 => "",
            5 => "",
        ];

        $archivo = $request->file('archivo');
        $contenidoCSV = file_get_contents($archivo->path());
        $lineasCSV = explode(PHP_EOL, $contenidoCSV);
        $datosCSV = [];
        foreach ($lineasCSV as $linea) {
            $valores  = explode(';', $linea);
            if($valores[0] !== ""){
                $datosCSV[] = array_slice($valores, 0, 6);
            }

        }
        array_shift($datosCSV);
        $role="";
        foreach ($datosCSV as $valores) {
            // Asignar valores de la línea a variables
            $codigo = $valores[0]; // Primer valor: CODIGO
            $nombres = $valores[1]; // Segundo valor: NOMBRES
            $apellido_paterno = $valores[2]; // Tercer valor: APELLIDO PATERNO
            $apellido_materno = $valores[3]; // Cuarto valor: APELLIDO MATERNO
            $escuelaId = $valores[5]; // Sexto valor: ESCUELA_ID
            $role = $request['Rol'];
            // Llamar a la función crearUserinstitucional con los valores
            $this->crearUserinstitucional($role, $codigo, $nombres, $apellido_materno, $apellido_paterno, $escuelaId);
        }


        return view('userinstitucional.lote.create',compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
