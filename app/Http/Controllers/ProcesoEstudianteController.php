<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Etapa;
use App\Models\Proceso;
use App\Models\Seccion;
use App\Models\Secpersona;
use App\Models\Semestre;
use App\Models\Tipoetapa;
use App\Models\Tipoproceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProcesoController
 */
class ProcesoEstudianteController extends Controller
{
    protected $procesoNoExistente;

    protected $user_id;

    protected $estudiante_id;

    protected $semestre;

    protected $procesos;

    public function __construct()
    {
        $this->semestre = Semestre::orderBy('id', 'desc')->first();
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user();
            $this->estudiante_id = $this->user_id->userinstitucional->id;
            $this->procesos = Proceso::where([['estudiante_id', $this->estudiante_id],
                ['semestre_id', $this->semestre->id],
            ])->get();

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ver_metodo($metodo, $proceso, $etapa)
    {

        if ($metodo !== 'create') {
            $EstudianteProceso = Proceso::where([
                'tipoproceso_id' => $proceso->id,
                'estudiante_id' => $this->estudiante_id,
                'semestre_id' => $this->semestre->id,
            ])->firstOrFail();
            $Etapas = Etapa::where([
                'proceso_id' => $this->procesos->first()->id,
                'tipoetapas_id' => $etapa,
            ])->firstOrFail();

        } else {
            $Etapas = new Etapa;
            $Etapas->proceso_id = $this->procesos->first()->id;
            $Etapas->tipoetapas_id = $etapa;

        }

        return view('modo_etapas.estudiante', compact('Etapas', 'metodo'));
        // return "Procesando proceso '$EstudianteProceso";

    }

    public function procesar(Request $request, $nombre, $etapa = null, $metodo = null)
    {
        $proceso = Tipoproceso::where('name', $nombre)->firstOrFail();
        // Procesar la URL según los parámetros recibidos
        if (! is_null($etapa) && ! is_null($metodo)) {
            // Si se proporcionan todos los parámetros

            return $this->ver_metodo($metodo, $proceso, $etapa);

        } elseif (! is_null($etapa)) {
            // Si se proporciona solo el nombre y la etapa
            return "Procesando proceso '$nombre' en la etapa '$etapa'";
        } else {
            // Si solo se proporciona el nombre
            $procesosFiltrados = $this->procesos;
            $procesosFiltrados = $procesosFiltrados->filter(function ($subproceso) use ($proceso) {
                return $subproceso->tipoproceso_id === $proceso->id;
            });
            if ($procesosFiltrados->isEmpty()) {
                return $this->create_proceso($proceso->id);
            }

            return $this->index_proceos($procesosFiltrados->first()->id);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_proceos($id_proceso)
    {
        $proceso = Proceso::where('id', $id_proceso)->first();
        $tipoetapas = Tipoetapa::where('tipoproceso_id', $proceso->tipoproceso_id)->get();
        $etapas = [];
        $etapabase = new Etapa;
        $etapabase->id = 99;
        $etapabase->proceso_id = $proceso->id;
        $etapabase->estado_id = 5;
        $proceoetapas = $proceso->etapas;

        foreach ($tipoetapas as $etapa) {

            $etapa_con_tipoetapa = $proceoetapas->whereIn('tipoetapas_id', $etapa->id)->first();
            if ($etapa_con_tipoetapa) {
                $etapas[] = $etapa_con_tipoetapa;
            } else {
                $newEtapa = $etapabase->replicate();
                $newEtapa->tipoetapas_id = $etapa->id;
                $etapas[] = $newEtapa;
            }

        }

        return view('proceso.estudiante.index', compact('proceso', 'tipoetapas', 'etapas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('dashboard');
        if ($this->procesoNoExistente) {
            return redirect()->route('desempeno.create');
        }
        $estudiante = $this->procesos;
        $proceso = Proceso::where('estudiante_id', 1)->first();

        return view('proceso.estudiante.index', compact('proceso', 'estudiante'));
    }

    public function create_proceso($id_proceso)
    {
        $user = auth()->user();

        // where istitucional ->id
        // where semestre ->id
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $semestreactual = $semestre->keys()->first();
        // $secciones = Seccion::where()
        // where('docente_id', '=', $user->Userinstitucional->id)->get();

        $proceso = new Proceso;
        $proceso->estudiante_id = $user->userinstitucional->id;

        $proceso->semestre_id = $semestreactual;

        $estados = Estado::all()->pluck('name', 'id');
        $proceso->estado_id = 5;

        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');
        $proceso->tipoproceso_id = $id_proceso;

        return view('proceso.estudiante.create', compact('proceso', 'semestre', 'estados', 'tipoprocesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        $proceso = new Proceso;
        $proceso->estudiante_id = $user->userinstitucional->id;

        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $proceso->semestre_id = $semestre->keys()->first();

        $estados = Estado::all()->pluck('name', 'id');
        $proceso->estado_id = 1;

        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');
        $proceso->tipoproceso_id = 1;

        return view('proceso.estudiante.create', compact('proceso', 'semestre', 'estados', 'tipoprocesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $semestreactual = $semestre->keys()->first();
        $secciones = Secpersona::where('estudiante_id', $user->userinstitucional->id)->first();
        $docente_id = null;

        if ($secciones) {
            $seccion = Seccion::find($secciones->seccion_id);
            $docente_id = $seccion->docente_id;
        }
        $request['docente_id'] = $docente_id;
        request()->validate(Proceso::$rules);
        $proceso = Proceso::create($request->all());

        return back()
            ->with('success', 'Proceso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proceso = Proceso::find($id)->delete();

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso deleted successfully');
    }
}
