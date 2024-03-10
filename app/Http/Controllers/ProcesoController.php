<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Semestre;
use App\Models\Estado;
use App\Models\Tipoproceso;
/**
 * Class ProcesoController
 * @package App\Http\Controllers
 */
class ProcesoController extends Controller
{
    public function index()
    {
        $semestre = Semestre::orderBy('id', 'desc')->first();
        $user = auth()->user();
        if ($user->hasRole('administrador')){
            $procesos = Proceso::all();
        }
        elseif ($user->hasRole('docente') || $user->hasRole('asistente docencia')){
            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->where('escuela_id', $user->Userinstitucional->escuela_id);
            })
            ->get();
        }


        return view('proceso.index', compact('procesos'));
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
