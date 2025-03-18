<?php

namespace App\Http\Controllers;

use App\Models\Modelador;
use Illuminate\Http\Request;

/**
 * Class ModeladorController
 */
class ModeladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeladors = Modelador::paginate();

        return view('modelador.index', compact('modeladors'))
            ->with('i', (request()->input('page', 1) - 1) * $modeladors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelador = new Modelador();

        return view('modelador.create', compact('modelador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modelador::$rules);

        $modelador = Modelador::create($request->all());

        return redirect()->route('modeladors.index')
            ->with('success', 'Modelador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelador = Modelador::find($id);

        return view('modelador.show', compact('modelador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelador = Modelador::find($id);

        return view('modelador.edit', compact('modelador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelador $modelador)
    {
        request()->validate(Modelador::$rules);

        $modelador->update($request->all());

        return redirect()->route('modeladors.index')
            ->with('success', 'Modelador updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modelador = Modelador::find($id)->delete();

        return redirect()->route('modeladors.index')
            ->with('success', 'Modelador eliminado exitosamente');
    }
}
