<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Estado;
use App\Models\Tipoproceso;
/**
 * Class ProcesoController
 * @package App\Http\Controllers
 */
class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $proceso = Proceso::where('estudiante_id', 1)->first();
        return view('proceso.estudiante.index',compact('proceso'));
    }

    public function indexa()
    {
        $procesos = Proceso::paginate();

        return view('proceso.index', compact('procesos'))
            ->with('i', (request()->input('page', 1) - 1) * $procesos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proceso = new Proceso();

        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $proceso->semestre_id = $semestre->keys()->first();

        $estados = Estado::all()->pluck('name', 'id');
        $proceso->estado_id = 1;

        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');

        return view('proceso.estudiante.create', compact('proceso','semestre','estados','tipoprocesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proceso::$rules);

        $proceso = Proceso::create($request->all());

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso = Proceso::find($id);

        return view('proceso.show', compact('proceso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proceso = Proceso::find($id);

        return view('proceso.edit', compact('proceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proceso $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proceso $proceso)
    {
        request()->validate(Proceso::$rules);

        $proceso->update($request->all());

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proceso = Proceso::find($id)->delete();

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso deleted successfully');
    }
}
