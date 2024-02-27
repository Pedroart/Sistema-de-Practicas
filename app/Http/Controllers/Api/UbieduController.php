<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\facultad;
use App\Models\DepartamentoAcademico;
use App\Models\Escuela;

class UbieduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json();
    }

    public function facultad()
    {
        return facultad::all();
    }

    public function departamento($id_facultad)
    {
        $facultadB = facultad::findOrFail($id_facultad);
        $departamentos=$facultadB->departamentos;

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
