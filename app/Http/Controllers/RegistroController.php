<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Semestre;
use App\Models\User;
use App\Traits\Upload;
use App\Models\File;
use App\Models\Estado;
/**
 * Class RegistroController
 * @package App\Http\Controllers
 */
class RegistroController extends Controller
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

        if ($user->hasRole('docente supervisor')) {
            // Si el usuario tiene el rol 'docente_titular', realizar otra acción
            $registros = Registro::where('userinstitucional_id', $user->userinstitucional->id)->paginate();
        } else {
            // Otro tipo de usuario, realizar una acción por defecto
            $registros = Registro::paginate();
        }

        return view('registro.index', compact('registros'))
            ->with('i', (request()->input('page', 1) - 1) * $registros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registro = new Registro();
        $registro->semestre = Semestre::orderBy('id', 'desc')->first();
        $user = Auth::user();
        $estudiantes = User::getUsersWithRole('docente supervisor');

        $listadoInstitucional = $estudiantes->map(function ($estudiante){
            return [
                'id'=>$estudiante->userinstitucional->id,
                'name'=>$estudiante->userinstitucional->codigo
            ];
        })->pluck('name', 'id');

        return view('registro.create', compact('registro','listadoInstitucional','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registro::$rules);
        $user = Auth::user();
        $request['estado_id']=2;
        $ficha = null;
        $recod = null;
        if ($request->hasFile('doc1_id')) {

            $path = $this->UploadFile($request->file('doc1_id'), 2);//use the method in the trait
            $save = [
                'path'=>$path,
                'rutafile_id'=>2,
            ];

            $ficha = File::create($save)->id;
        }
        if ($request->hasFile('doc2_id')) {

            $path = $this->UploadFile($request->file('doc2_id'), 2);//use the method in the trait
            $save = [
                'path'=>$path,
                'rutafile_id'=>2,
            ];

            $recod = File::create($save)->id;
        }

        Registro::create([
            'semestre_id'=>$request['semestre_id'],
            'userinstitucional_id'=>$request['userinstitucional_id'],
            'estado_id'=>$request['estado_id'],
            'doc1_id'=>$ficha,
            'doc2_id'=>$recod,
        ]);

        return redirect()->route('registros.index')
            ->with('success', 'Registro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Registro::find($id);

        return view('Registro.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Registro::find($id);
        $user = Auth::user();
        $estudiantes = User::getUsersWithRole('docente supervisor');

        $listadoInstitucional = $estudiantes->map(function ($estudiante){
            return [
                'id'=>$estudiante->userinstitucional->id,
                'name'=>$estudiante->userinstitucional->codigo
            ];
        })->pluck('name', 'id');

        $estados = Estado::all()->pluck('name', 'id');

        return view('registro.edit', compact('registro','listadoInstitucional','user','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registro $Registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $Registro)
    {
        $Registro->update(["estado_id"=>$request['estado_id']]);
        if($request['estado_id']==3){
            $Registro->userinstitucional->user->assignRole('registrodo');
        }


        return redirect()->route('registros.index')
            ->with('success', 'Registro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {


        $Registro = Registro::find($id)->Registro;
        $record = Registro::find($id)->record;

        if (!is_null($Registro->path)) {
            $this->deleteFile($Registro->path);
        }


        if (!is_null($record->path)) {
            $this->deleteFile($record->path);
        }


        $matri = Registro::find($id)->delete();
        $Registro->delete();
        $record->delete();

        return redirect()->route('Registros.index')
            ->with('success', 'Registro deleted successfully');
    }
}
