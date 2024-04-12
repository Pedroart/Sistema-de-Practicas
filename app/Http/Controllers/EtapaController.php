<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;
use App\Models\Modelador;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
/**
 * Class EtapaController
 * @package App\Http\Controllers
 */
class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapas = Etapa::paginate();

        return view('etapa.index', compact('etapas'))
            ->with('i', (request()->input('page', 1) - 1) * $etapas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etapa = new Etapa();
        return view('etapa.create', compact('etapa'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_modular(Request $request,$tipoproceso)
    {
        // $request->file() <- obtener files

        $modeladorRaw = Modelador::where('tipoetapa_id',$tipoproceso)->first();
        $modelos = json_decode($modeladorRaw->modelo);

        $etiquetas = array_map(function($elemento) {
            return str_replace('.', '_', $elemento['etiqueta_modelo']);
        }, json_decode($modeladorRaw->modelo,TRUE));
        $agrupados = [];
        // Iterar sobre cada elemento del array
        foreach ($request->all() as $clave => $valor) {
            if($clave !== '_token'){
                // Dividir la clave en etiqueta y atributo
                list($etiqueta, $atributo) = explode('#', $clave);

                // Verificar si la etiqueta está presente en la lista de etiquetas
                if (in_array($etiqueta, $etiquetas)) {
                    // Verificar si la etiqueta ya está presente en el array agrupado
                    if (!isset($agrupados[$etiqueta])) {
                        $agrupados[$etiqueta] = [];
                    }

                    // Agregar el elemento al array agrupado
                    if(!$request->hasFile($clave)){
                        $agrupados[$etiqueta][$atributo] = $valor;
                    }else{

                    }

                }
            }

        }
        /* Observar posibilidad
        foreach ($request->file() as $clave => $valor) {
            list($etiqueta, $atributo) = explode('#', $clave);
            // Verificar si la etiqueta está presente en la lista de etiquetas
            if (in_array($etiqueta, $etiquetas)) {
                // Verificar si la etiqueta ya está presente en el array agrupado
                if (!isset($agrupados[$etiqueta])) {
                    $agrupados[$etiqueta] = [];
                }

                $agrupados[$etiqueta][$atributo] = $request->file($clave);

            }

        }*/

        // Etapa de procesado

        // Invierte el orden de los elementos en la lista
        $Dependencias = array_reverse($modelos);

        // Itera sobre la lista invertida
        foreach ($Dependencias as $clave => $Models) {
            $etiquetaModel = $Models->etiqueta_modelo;
            $atributo = $agrupados[$etiquetaModel];
            $id=App::make($Models->modelo_tipo)::create($atributo);
            return response()->json($id);
        }

        return response()->json($Dependencias);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Etapa::$rules);

        $etapa = Etapa::create($request->all());

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapa = Etapa::find($id);

        return view('etapa.show', compact('etapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapa = Etapa::find($id);

        return view('etapa.edit', compact('etapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Etapa $etapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etapa $etapa)
    {
        request()->validate(Etapa::$rules);

        $etapa->update($request->all());

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etapa = Etapa::find($id)->delete();

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa deleted successfully');
    }
}
