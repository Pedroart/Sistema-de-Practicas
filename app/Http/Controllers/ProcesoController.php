<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Api\UbieduController;
use App\Models\Semestre;
use App\Models\Estado;
use App\Models\Tipoproceso;
use App\Models\Userinstitucional;
use App\Models\Tipoetapa;
use App\Models\Etapa;
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
        elseif ($user->hasRole('docente') || $user->hasRole('asistente docencia') || $user->hasRole('director escuela') ){
            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->where('escuela_id', $user->Userinstitucional->escuela_id);
            })
            ->get();
        }
        elseif ($user->hasRole('director facultad')){

        }
        elseif ($user->hasRole('director academico')){

        }
        elseif ($user->hasRole('director escuela')){

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

    public function ver_metodo($id,$etapa,$metodo)
    {

        $Etapas=Etapa::where([
                'proceso_id' =>$id,
                'tipoetapas_id'=>$etapa
            ])->firstOrFail();

        $estados = Estado::all()->pluck('name', 'id');

        return view('modo_etapas.profesores',compact('Etapas','metodo','estados'));
        //return "Procesando proceso '$EstudianteProceso";


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function estado(Request $request,$id_etapa)
    {

        $etapa = Etapa::find($id_etapa);

        $etapa->update(['estado_id' => $request->estado_id]);

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso created successfully.');
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

        $tipoetapas = Tipoetapa::where('tipoproceso_id',$proceso->tipoproceso_id)->get();
        $etapas = [];
        $etapabase = new Etapa();
        $etapabase->id = 99;
        $etapabase->proceso_id = $proceso->id;
        $etapabase->estado_id = 5;
        $proceoetapas = $proceso->etapas;

        foreach($tipoetapas as $etapa){

            $etapa_con_tipoetapa = $proceoetapas->whereIn('tipoetapas_id', $etapa->id)->first();
            if($etapa_con_tipoetapa){
                $etapas[] = $etapa_con_tipoetapa ;
            }
            else{
                $newEtapa = $etapabase->replicate();
                $newEtapa->tipoetapas_id = $etapa->id;
                $etapas[] = $newEtapa;
            }

        }


        return view('proceso.show', compact('proceso','etapas'));
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
        $listadodocentes= User::getUsersWithRole('docente');
        $docentes = $listadodocentes->map(function($user){
            return [
                'id'=>$user->userinstitucional->id,
                'name'=>$user->userinstitucional->codigo.' | '.$user->name,
            ];
        })->pluck('name', 'id');
        $estudiantes = User::getUsersWithRole('estudiante');
        $listadoInstitucional = $estudiantes->map(function ($estudiante){
            return [
                'id'=>$estudiante->userinstitucional->id,
                'name'=>$estudiante->userinstitucional->codigo
            ];
        })->pluck('name', 'id');
        $estados = Estado::all()->pluck('name', 'id');
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $estudiante = Userinstitucional::where('id',$proceso->estudiante_id);
        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');
        return view('proceso.edit', compact('proceso','docentes','estados','semestre','tipoprocesos','listadoInstitucional'));
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
