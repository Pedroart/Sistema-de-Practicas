<?php

namespace App\Http\Controllers;
use App\Models\Escuela;
use App\Models\Secpersona;
use App\Models\User;
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
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            $roles = [
                "administrador"=>"administrador",
                "decano de facultad"=>"decano de facultad",
                "director academico"=>"director academico",
                "director escuela"=>"director escuela",
                "docente titular"=>"docente titular",
                "docente supervisor"=>"docente supervisor",
                "estudiante"=>"estudiante"
            ];
        } else {
            $roles = [
                "docente supervisor"=>"docente supervisor",
                "estudiante"=>"estudiante"
            ];
        }



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

    public function patron(Request $request){
        $request->validate([
            'archivo' => 'required|file|mimes:csv,txt',
        ]);

        $archivo = $request->file('archivo');
        $contenidoCSV = file_get_contents($archivo->path());
        $lineasCSV = explode(PHP_EOL, $contenidoCSV);
        $datosCSV = [];
        foreach ($lineasCSV as $linea) {
            $valores  = explode(',', $linea);
            if($valores[0] !== ""){
                $datosCSV[] = array_slice($valores, 0, 6);
            }

        }
        array_shift($datosCSV);
        
        // Extraer el dato del índice 0
        // Extraer el dato del índice 0
        $curso = "Escuela Profesional de ".  trim($datosCSV[0][2], '"');

        // Convertir todo el texto a minúsculas
        $curso = mb_strtolower($curso, "UTF-8");

        // Procesar los datos de los estudiantes
        $estudiantes = array_map(function($registro) {
            // Verificar si el registro tiene los datos necesarios
            if (isset($registro[1], $registro[2], $registro[3])) {
                $nombreCompleto = explode(' ', $registro[2]);
                $apellidoPaterno = array_shift($nombreCompleto);
                $apellidoMaterno = array_shift($nombreCompleto);
                $nombre = implode(' ', $nombreCompleto);

                return [
                    'codigo' => $registro[1],
                    'nombre' => $nombre,
                    'apellido_paterno' => $apellidoPaterno,
                    'apellido_materno' => $apellidoMaterno,
                    'correo' => $registro[3],
                ];
            }
            return null; // O devolver un valor predeterminado si el registro no es válido
        }, array_slice($datosCSV, 2));
        
        // Filtrar los valores nulos
        $estudiantes = array_filter($estudiantes);
        array_shift($estudiantes);
        
        $role = "estudiante";
        $escuela = Escuela::where('nombre', $curso)->first();
        $escuelaId = $escuela->id;
        $seccionId = $request['seccion_id'];
        foreach ($estudiantes as $estudiante) {
            if ($estudiante) { // Verificar que el estudiante no sea nulo
                $codigo = $estudiante['codigo'];
                $nombres = $estudiante['nombre'];
                $apellido_materno = $estudiante['apellido_materno'];
                $apellido_paterno = $estudiante['apellido_paterno'];

                // Definir el rol
                $role = "estudiante";

                // Llamar a la función para crear el usuario institucional
                $obj_estudiante=$this->crearUserinstitucional($role, $codigo, $nombres, $apellido_materno, $apellido_paterno, $escuelaId);
                if ($obj_estudiante) {
                    Secpersona::create([
                        'seccion_id' => $seccionId,
                        'estudiante_id' => $obj_estudiante->id,
                        'supervisor_id' => null // Puedes asignar un supervisor_id si lo tienes
                    ]);
                }
            }
        }

        /*
        $resultado = [
            'seccion' => $request['seccion_id'],
            'curso' => $escuelaId,
            'estudiantes' => $estudiantes,

        ];
        */

        return redirect()->back()->with('success', 'Tipoetapa created successfully.');
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
