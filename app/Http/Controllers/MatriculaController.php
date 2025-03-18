<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\File;
use App\Models\Matricula;
use App\Models\Semestre;
use App\Models\User;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class MatriculaController
 */
class MatriculaController extends Controller
{
    use Upload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        if ($user->hasRole('estudiante')) {
            // Si el usuario tiene el rol 'estudiante', realizar otra acción
            $matriculas = Matricula::where('userinstitucional_id', $user->userinstitucional->id)->paginate();
        } else {
            // Otro tipo de usuario, realizar una acción por defecto
            $matriculas = Matricula::paginate();
        }

        return view('matricula.index', compact('matriculas'))
            ->with('i', (request()->input('page', 1) - 1) * $matriculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matricula = new Matricula();
        $matricula->semestre = Semestre::orderBy('id', 'desc')->first();
        $user = Auth::user();
        $estudiantes = User::getUsersWithRole('estudiante');

        $listadoInstitucional = $estudiantes->map(function ($estudiante) {
            return [
                'id' => $estudiante->userinstitucional->id,
                'name' => $estudiante->userinstitucional->codigo,
            ];
        })->pluck('name', 'id');

        return view('matricula.create', compact('matricula', 'listadoInstitucional', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Matricula::$rules);
        $user = Auth::user();
        $request['estado_id'] = 2;
        $ficha = null;
        $recod = null;
        if ($request->hasFile('matricula_id')) {
            $path = $this->UploadFile($request->file('matricula_id'), 2); // use the method in the trait
            $save = [
                'path' => $path,
                'rutafile_id' => 2,
            ];

            $ficha = File::create($save)->id;
        }
        if ($request->hasFile('record_id')) {
            $path = $this->UploadFile($request->file('record_id'), 2); // use the method in the trait
            $save = [
                'path' => $path,
                'rutafile_id' => 2,
            ];

            $recod = File::create($save)->id;
        }

        Matricula::create([
            'semestre_id' => $request['semestre_id'],
            'userinstitucional_id' => $request['userinstitucional_id'],
            'estado_id' => $request['estado_id'],
            'matricula_id' => $ficha,
            'record_id' => $recod,
        ]);

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::find($id);

        return view('matricula.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id);
        $user = Auth::user();
        $estudiantes = User::getUsersWithRole('estudiante');

        $listadoInstitucional = $estudiantes->map(function ($estudiante) {
            return [
                'id' => $estudiante->userinstitucional->id,
                'name' => $estudiante->userinstitucional->codigo,
            ];
        })->pluck('name', 'id');

        $estados = Estado::all()->pluck('name', 'id');

        return view('matricula.edit', compact('matricula', 'listadoInstitucional', 'user', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        $matricula->update(['estado_id' => $request['estado_id']]);
        if ($request['estado_id'] == 3) {
            $matricula->userinstitucional->user->assignRole('matriculado');
        }

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {

        $matricula = Matricula::find($id)->matricula;
        $record = Matricula::find($id)->record;

        if (! is_null($matricula->path)) {
            $this->deleteFile($matricula->path);
        }

        if (! is_null($record->path)) {
            $this->deleteFile($record->path);
        }

        $matri = Matricula::find($id)->delete();
        $matricula->delete();
        $record->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula eliminado exitosamente');
    }
}
