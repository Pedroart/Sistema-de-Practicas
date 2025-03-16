<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Etapa;
use App\Models\Proceso;
use App\Models\Semestre;
use App\Models\Tipoetapa;
use App\Models\Tipoproceso;
use App\Models\User;
use App\Models\Userinstitucional;
use Illuminate\Http\Request;

/**
 * Class ProcesoController
 */
class ProcesoController extends Controller
{
    public function proceso_supervicion()
    {
        $semestre = Semestre::orderBy('id', 'desc')->first();
        $user = auth()->user();
        if ($user->hasRole('docente supervisor')) {
            $procesos = Proceso::where('semestre_id', $semestre->id)
                ->where('tipoproceso_id', 5) // Ignorar procesos con tipoproceso_id = 5
                ->where('estudiante_id', $user->Userinstitucional->id)
                ->get();
        }

        return view('proceso.index_supervisor', compact('procesos'));
    }

    public function proceso_estudiante($id)
    {

        $archivos = Archivo::where('proceso_id', $id);
        $empresa = Empresa::find((Archivo::where('proceso_id', $id)->where('etiqueta', 'model_empresa')->first())->id_model);
        // empresa_jefedirecto
        $jefe_directo = Empleado::find((Archivo::where('proceso_id', $id)->where('etiqueta', 'empresa_representante')->first())->id_model);

        return view('proceso.datos_estudiante', compact('empresa', 'jefe_directo'));
    }

    public function index_validacion()
    {
        $semestre = Semestre::orderBy('id', 'desc')->first();
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            $procesos = Proceso::all();
        } elseif ($user->hasRole('docente titular')) {
            $procesos = Proceso::where('semestre_id', $semestre->id)
                ->where('docente_id', '=', $user->Userinstitucional->id) // Ignorar procesos con tipoproceso_id = 5
                ->where('tipoproceso_id', '=', 5) // Ignorar procesos con tipoproceso_id = 5
                ->get();

            /*
            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->whereHas('escuela', function ($query) use ($user) {
                    $query->where('departamentoacademico_id', $user->Userinstitucional->escuela->departamentoacademico_id);
                });
            })
            ->where('tipoproceso_id', 5) // Ignorar procesos con tipoproceso_id = 5
            ->get();


            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->where('escuela_id', $user->Userinstitucional->escuela_id);
            })
            ->where('tipoproceso_id', '<>', 5) // Ignorar procesos con tipoproceso_id = 5
            ->get();


            /**$procesos = Proceso::where('semestre_id', $semestre->id)
            ->where(function ($query) use ($user) {
                $query->whereHas('estudiante', function ($query) use ($user) {
                    $query->where('escuela_id', $user->Userinstitucional->escuela_id);
                })
                ->where('tipoproceso_id', '<>', 5); // Ignorar procesos con tipoproceso_id = 5
            })
            ->orWhere(function ($query) use ($semestre, $user) {
                $query->where('semestre_id', $semestre->id)
                      ->whereHas('estudiante', function ($query) use ($user) {
                          $query->whereHas('escuela', function ($query) use ($user) {
                              $query->where('departamentoacademico_id', $user->Userinstitucional->escuela->departamentoacademico_id);
                          });
                      })
                      ->where('tipoproceso_id', 5); // Incluir solo procesos con tipoproceso_id = 5
            })
            ->get();
            */
        } elseif ($user->hasRole('docente supervisor')) {
            $procesos = Proceso::where('semestre_id', $semestre->id)
                ->where('estudiante_id', '=', $user->Userinstitucional->id) // Ignorar procesos con tipoproceso_id = 5
                ->where('tipoproceso_id', '=', 5) // Ignorar procesos con tipoproceso_id = 5
                ->get();

            foreach ($procesos as $proceso) {
                $estudiante = $proceso->archivo->estudiante;
                $proceso['procesos'] = Proceso::where('estudiante_id', '=', $estudiante->id)
                    ->where('docente_id', '=', $proceso->docente_id)->first();
            }

            return view('proceso.index_supervisor', compact('procesos'));
        } elseif ($user->hasRole('director academico')) {
        } elseif ($user->hasRole('director escuela')) {
        }

        return view('proceso.index_titular', compact('procesos'));
    }

    public function index()
    {
        $semestre = Semestre::orderBy('id', 'desc')->first();
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            $procesos = Proceso::all();
        } elseif ($user->hasRole('docente titular') || $user->hasRole('director escuela')) {
            $procesos = Proceso::where('semestre_id', $semestre->id)
                ->where('docente_id', $user->Userinstitucional->id)
                ->where('tipoproceso_id', '<>', 5) // Ignorar procesos con tipoproceso_id = 5
                ->get();
            /*
            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->where('escuela_id', $user->Userinstitucional->escuela_id);
            })
            ->where('tipoproceso_id', '<>', 5) // Ignorar procesos con tipoproceso_id = 5
            ->get();


            $procesos = Proceso::where('semestre_id', $semestre->id)
            ->whereHas('estudiante', function ($query) use ($user) {
                $query->whereHas('escuela', function ($query) use ($user) {
                    $query->where('departamentoacademico_id', $user->Userinstitucional->escuela->departamentoacademico_id);
                });
            })
            ->where('tipoproceso_id', 5) // Ignorar procesos con tipoproceso_id = 5
            ->get();

            */
            /**$procesos = Proceso::where('semestre_id', $semestre->id)
            ->where(function ($query) use ($user) {
                $query->whereHas('estudiante', function ($query) use ($user) {
                    $query->where('escuela_id', $user->Userinstitucional->escuela_id);
                })
                ->where('tipoproceso_id', '<>', 5); // Ignorar procesos con tipoproceso_id = 5
            })
            ->orWhere(function ($query) use ($semestre, $user) {
                $query->where('semestre_id', $semestre->id)
                      ->whereHas('estudiante', function ($query) use ($user) {
                          $query->whereHas('escuela', function ($query) use ($user) {
                              $query->where('departamentoacademico_id', $user->Userinstitucional->escuela->departamentoacademico_id);
                          });
                      })
                      ->where('tipoproceso_id', 5); // Incluir solo procesos con tipoproceso_id = 5
            })
            ->get();
            */
        } elseif ($user->hasRole('docente supervisor')) {
            $procesos = Proceso::where('semestre_id', $semestre->id)
                ->where('estudiante_id', $user->Userinstitucional->id)
                ->get();
        } elseif ($user->hasRole('director academico')) {
        } elseif ($user->hasRole('director escuela')) {
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

        return view('proceso.estudiante.create', compact('proceso', 'semestre', 'estados', 'tipoprocesos'));
    }

    public function ver_metodo($id, $etapa, $metodo)
    {

        $Etapas = Etapa::where([
            'proceso_id' => $id,
            'tipoetapas_id' => $etapa,
        ])->firstOrFail();

        $estados = Estado::all()->pluck('name', 'id');

        return view('modo_etapas.profesores', compact('Etapas', 'metodo', 'estados'));
        // return "Procesando proceso '$EstudianteProceso";
    }

    public function procesar(Request $request, $id, $nombre, $etapa = null, $metodo = null)
    {
        $nombre = 'Registro de Supervicion';

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
            $procesosFiltrados = Proceso::find($id);

            return $this->index_proceos($id);
        }
    }

    public function index_proceos($id_proceso)
    {
        $proceso = Proceso::where('id', $id_proceso)->first();
        $tipoetapas = Tipoetapa::where('tipoproceso_id', $proceso->tipoproceso_id)->get();
        $etapas = [];
        $etapabase = new Etapa();
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
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function estado(Request $request, $id_etapa)
    {

        $etapa = Etapa::find($id_etapa);

        $etapa->update(['estado_id' => $request->estado_id]);

        return redirect()->route('procesos.index')
            ->with('success', 'Proceso created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso = Proceso::find($id);

        $tipoetapas = Tipoetapa::where('tipoproceso_id', $proceso->tipoproceso_id)->get();
        $etapas = [];
        $etapabase = new Etapa();
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

        return view('proceso.show', compact('proceso', 'etapas'));
    }

    public function edit_titular($id)
    {
        $proceso = Proceso::find($id);
        $listadodocentes = User::getUsersWithRole('docente titular');
        $docentes = $listadodocentes->map(function ($user) {
            return [
                'id' => $user->userinstitucional->id,
                'name' => $user->userinstitucional->codigo . ' | ' . $user->name,
            ];
        })->pluck('name', 'id');
        $estudiantes = User::getUsersWithRole('estudiante');
        $listadoInstitucional = $estudiantes->map(function ($estudiante) {
            return [
                'id' => $estudiante->userinstitucional->id,
                'name' => $estudiante->userinstitucional->codigo,
            ];
        })->pluck('name', 'id');
        $estados = Estado::all()->pluck('name', 'id');
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $estudiante = Userinstitucional::where('id', $proceso->estudiante_id);
        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');

        return view('proceso.edit_titular', compact('proceso', 'docentes', 'estados', 'semestre', 'tipoprocesos', 'listadoInstitucional'));
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
        $listadodocentes = User::getUsersWithRole('docente titular');
        $docentes = $listadodocentes->map(function ($user) {
            return [
                'id' => $user->userinstitucional->id,
                'name' => $user->userinstitucional->codigo . ' | ' . $user->name,
            ];
        })->pluck('name', 'id');
        $estudiantes = User::getUsersWithRole('estudiante');
        $listadoInstitucional = $estudiantes->map(function ($estudiante) {
            return [
                'id' => $estudiante->userinstitucional->id,
                'name' => $estudiante->userinstitucional->codigo,
            ];
        })->pluck('name', 'id');
        $estados = Estado::all()->pluck('name', 'id');
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');
        $estudiante = Userinstitucional::where('id', $proceso->estudiante_id);
        $tipoprocesos = Tipoproceso::all()->pluck('name', 'id');

        return view('proceso.edit', compact('proceso', 'docentes', 'estados', 'semestre', 'tipoprocesos', 'listadoInstitucional'));
    }

    public function update_titular(Request $request, $id)
    {
        request()->validate(Proceso::$rules);
        $proceso = Proceso::find($id);
        $proceso->update($request->all());

        return redirect()->route('validacion.index')
            ->with('success', 'Proceso updated successfully');
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
