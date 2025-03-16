<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ubidepartamento;
use App\Models\Ubidistrito;
use App\Models\Ubiprovincia;
use Illuminate\Http\Request;

class UbigeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json($this->consolidad($id), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function consolidad($id)
    {
        $distrito = UbiDistrito::findOrFail($id);
        $provincia = $distrito->Ubiprovincia;
        $departamento = $provincia->Ubidepartamento;

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

        return $formattedData;
    }

    public function departamentos()
    {
        return Ubidepartamento::all();
    }

    public function provincias($id_ubidepartamento)
    {
        // Buscar el departamento por su ID
        $departamento = UbiDepartamento::findOrFail($id_ubidepartamento);

        // Obtener las provincias asociadas al departamento
        $provincias = $departamento->ubiprovincia;

        // Retornar las provincias como respuesta JSON
        try {
            return response()->json($provincias);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function distrito($id_ubiprovincia)
    {
        // Buscar el departamento por su ID
        $provincia = Ubiprovincia::findOrFail($id_ubiprovincia);

        // Obtener las provincias asociadas al departamento
        $distrito = $provincia->ubidistrito;

        // Retornar las provincias como respuesta JSON
        return response()->json($distrito);
    }

    /**
     * Store a newly created resource in storage.
     *
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
