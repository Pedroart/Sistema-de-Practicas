<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DepartamentoAcademico;
use App\Models\Escuela;
use App\Models\facultad;

class UbieduController extends Controller
{
    public function consolidado($id)
    {
        $escuela = escuela::findOrFail($id);
        $departamento = $escuela->departamentoacademico;
        $facultad = $departamento->facultad;

        // Construir el array asociativo con el formato deseado
        $formattedData = [
            'escuela' => [
                'id' => $escuela->id,
                'nombre' => $escuela->nombre,
            ],
            'departamento' => [
                'id' => $departamento->id,
                'nombre' => $departamento->nombre,
            ],
            'facultad' => [
                'id' => $facultad->id,
                'nombre' => $facultad->nombre,
            ],
        ];

        return $formattedData;
    }

    public function comparacion($grado, $id1, $id2)
    {
        $data1 = $this->consolidado($id1);
        $data2 = $this->consolidado($id1);

        return ($data1['grado']['id'] == $data2['grado']['id']) ? true : false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json($this->consolidado($id), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function facultad()
    {
        return facultad::all();
    }

    public function departamento($id_facultad)
    {
        $facultadB = facultad::findOrFail($id_facultad);
        $departamentos = $facultadB->departamentos;

        return response()->json($departamentos);
    }

    public function escuela($id_departamento)
    {
        $departamentoB = DepartamentoAcademico::findOrFail($id_departamento);
        $escuelas = $departamentoB->escuelas;

        return response()->json($escuelas);
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
