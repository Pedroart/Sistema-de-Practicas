<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Proceso;
use App\Models\Seccion;
use App\Models\Secpersona;
use App\Models\Secsuper;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            $secciones = Seccion::all();
        } else {
            $secciones = Seccion::where('docente_id', '=', $user->Userinstitucional->id)->get();
        }

        // Obtén todas las secciones y pásalas a la vista
        return view('seccion.index', compact('secciones'));
    }

    public function create()
    {
        $profesores_ = User::getUsersWithRole('docente titular');

        $profesores = $profesores_->map(function ($profesor) {
            return (object) [
                'id' => $profesor->userinstitucional->id,
                'codigo' => $profesor->userinstitucional->codigo,
                'nombre' => trim(
                    ($profesor->userinstitucional->persona->name ?? $profesor->name ) . ' ' . 
                    ($profesor->userinstitucional->persona->apellido_paterno ?? '') . ' ' . 
                    ($profesor->userinstitucional->persona->apellido_materno ?? '')
                ),

            ];            
        })->pluck('nombre', 'id');
        $semestres = Semestre::orderByDesc('id')->pluck('name', 'id');

        // Devuelve la vista para crear una nueva sección
        return view('seccion.create', compact('profesores', 'semestres'));
    }

    public function store(Request $request)
    {
        // Valida y guarda la nueva sección
        $request->validate([
            'semestre_id' => 'required|string|max:255',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')
            ->with('success', 'Sección creada exitosamente.');
    }

    public function supervisores(Request $request)
    {
        $request->validate([
            'supervisores' => 'required|array',
            'supervisores.*' => 'integer|exists:userinstitucionals,id',
        ]);
        $seccion_id = $request->input('seccion_id');
        $supervisores = $request->input('supervisores', []);

        foreach ($supervisores as $supervisor_id) {
            Secsuper::create([
                'seccion_id' => $seccion_id,
                'supervisor_id' => $supervisor_id,
            ]);
        }

        return redirect()->back()->with('success', 'supervisores creado exitosamente.');
    }

    public function show($id)
    {
        // Muestra una sección específica
        $seccion = Seccion::find($id);
        $estudiantes = $seccion->secpersonas;
        $supervisores = Secsuper::where('seccion_id', $seccion->id)->get();

        $profesores_ = User::getUsersWithRole('docente supervisor');

        $profesores_ = User::role('docente supervisor') // Use the 'role' method provided by Spatie Permissions
            ->whereHas('userinstitucional') // Ensure they have a 'userinstitucional' relationship
            ->with('userinstitucional') // Eager load this relationship
            ->get();

        $lista_supervisores = $profesores_->map(function ($profesor) use ($seccion) {
            if ($profesor->userinstitucional->escuela_id == $seccion->docente->escuela_id) {
                return (object) [
                    'id' => $profesor->userinstitucional->id,
                    'apellido' => $profesor->name,
                    'nombre' => $profesor->userinstitucional->persona?->apellido_paterno,
                ];
            }
        });

        return view('seccion.view', compact('seccion', 'estudiantes', 'supervisores', 'lista_supervisores'));
    }

    public function grupos(Request $request, $id)
    {
        // Decodificar el JSON de los grupos
        $grupos = json_decode($request->input('grupos'), true);
        $seccion = Seccion::find($id);
        $semestre = Semestre::orderByDesc('id')->pluck('name', 'id');

        // Iterar sobre los grupos
        foreach ($grupos as $grupo) {
            $profesor_id = $grupo['grupo_id']; // Cambiamos el nombre a profesor_id
            $estudiantes = $grupo['estudiantes']; // Lista de estudiantes

            // Iterar sobre los estudiantes
            foreach ($estudiantes as $estudiante_id) {
                // Buscar el registro en Secpersona que tenga la seccion_id y el estudiante_id
                $secpersona = Secpersona::where('seccion_id', $id)
                    ->where('estudiante_id', $estudiante_id)
                    ->first();

                // Si existe el registro, asignamos el supervisor_id
                if ($secpersona) {
                    $secpersona->supervisor_id = $profesor_id;
                    $secpersona->save();

                    $proceso = Proceso::create([
                        'docente_id' => $seccion->docente_id,
                        'estudiante_id' => $profesor_id,
                        'semestre_id' => $semestre->keys()->first(),
                        'estado_id' => 1,
                        'tipoproceso_id' => 5,
                    ]);

                    $Archivos = Archivo::create([
                        'proceso_id' => $proceso->id,
                        'model_type' => 'userinstitucional',
                        'id_model' => $estudiante_id,
                        'etiqueta' => 'estudiante_id']);
                    //                    return $Archivos;
                } else {
                    // Opcional: Si no existe el registro, podrías crear uno nuevo o manejar el caso
                    // Secpersona::create([
                    //     'seccion_id' => $id,
                    //     'estudiante_id' => $estudiante_id,
                    //     'supervisor_id' => $profesor_id,
                    // ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Grupos creado exitosamente.');
    }

    public function edit($id)
    {
        // Devuelve la vista para editar una sección específica
        $seccion = Seccion::find($id);
        $estudiantesTransformados = Secpersona::where('seccion_id', $seccion->id)->get();
        $estudiantes_sin_grupo = 0;
        $estudiantes = $estudiantesTransformados->map(function ($estudiante) use (&$estudiantes_sin_grupo) {
            // Verificar si el estudiante no tiene grupo
            if (is_null($estudiante->supervisor_id)) {
                $estudiantes_sin_grupo += 1;
            }

            return (object) [
                'id' => $estudiante->estudiante->id,
                'nombre' => $estudiante->estudiante->persona->name,
                'apellido' => $estudiante->estudiante->persona->apellido_paterno,
                'grupo_id' => $estudiante->supervisor_id, // Suponiendo que supervisor_id es el campo que corresponde al grupo_id
            ];
        });

        $profesores_ = Secsuper::where('seccion_id', $seccion->id)->get();
        $grupos = $profesores_->map(function ($profesor) {
            return (object) [
                'id' => $profesor->supervisor_id,
                'apellido' => $profesor->name,
                'nombre_profesor' => $profesor->supervisor->persona?->name . ' ' . $profesor->supervisor->persona?->apellido_paterno,
            ];
        });
        $exasec = new Secsuper();

        return view('seccion.asignaciones', compact('seccion', 'estudiantes', 'grupos', 'estudiantes_sin_grupo'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza una sección específica
        $request->validate([
            'semestre' => 'required|string|max:255',
        ]);

        $seccion = Seccion::find($id);
        $seccion->update($request->all());

        return redirect()->route('secciones.index')
            ->with('success', 'Sección actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Elimina una sección específica
        $seccion = Seccion::find($id);
        $seccion->delete();

        return redirect()->route('secciones.index')
            ->with('success', 'Sección eliminada exitosamente.');
    }
}
