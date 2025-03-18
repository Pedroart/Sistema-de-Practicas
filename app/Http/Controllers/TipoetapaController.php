<?php

namespace App\Http\Controllers;

use App\Models\Tipoetapa;
use Illuminate\Http\Request;

/**
 * Class TipoetapaController
 */
class TipoetapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoetapas = Tipoetapa::paginate();

        return view('tipoetapa.index', compact('tipoetapas'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoetapas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoetapa = new Tipoetapa();

        return view('tipoetapa.create', compact('tipoetapa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipoetapa::$rules);

        $tipoetapa = Tipoetapa::create($request->all());

        return redirect()->route('tipoetapas.index')
            ->with('success', 'Tipoetapa creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoetapa = Tipoetapa::find($id);

        return view('tipoetapa.show', compact('tipoetapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoetapa = Tipoetapa::find($id);

        return view('tipoetapa.edit', compact('tipoetapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoetapa $tipoetapa)
    {
        request()->validate(Tipoetapa::$rules);

        $tipoetapa->update($request->all());

        return redirect()->route('tipoetapas.index')
            ->with('success', 'Tipoetapa updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoetapa = Tipoetapa::find($id)->delete();

        return redirect()->route('tipoetapas.index')
            ->with('success', 'Tipoetapa eliminado exitosamente');
    }
}
