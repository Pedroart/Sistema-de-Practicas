<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ubidepartamento;
use App\Models\ubiprovincia;
use App\Models\ubidistrito;

class UbigeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $distrito = UbiDistrito::findOrFail($id);
        $provincia = $distrito->ubiprovincia;
        $departamento = $provincia->ubidepartamento;

        // Construir el array asociativo con el formato deseado
        $formattedData = [
            'distrito' => [
                'id' => $distrito->id,
                'nombre' => $distrito->nombre,
            ],
            'provincia' => [
                'id' => $provincia->id,
                'nombre' => $provincia->nombre,
            ],
            'departamento' => [
                'id' => $departamento->id,
                'nombre' => $departamento->nombre,
            ],
        ];

        // Retornar la respuesta JSON con el array asociativo formateado
        return response()->json($formattedData, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function departamentos()
    {
        return ubidepartamento::all();
    }

    public function provincias($id_ubidepartamento){
        // Buscar el departamento por su ID
        $departamento = UbiDepartamento::findOrFail($id_ubidepartamento);

        // Obtener las provincias asociadas al departamento
        $provincias = $departamento->ubiprovincia;

        // Retornar las provincias como respuesta JSON
        return response()->json($provincias);
    }

    public function distrito($id_ubiprovincia){
        // Buscar el departamento por su ID
        $provincia = ubiprovincia::findOrFail($id_ubiprovincia);

        // Obtener las provincias asociadas al departamento
        $distrito = $provincia->ubidistrito;

        // Retornar las provincias como respuesta JSON
        return response()->json($distrito);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
