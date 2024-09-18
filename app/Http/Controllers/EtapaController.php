<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;
use App\Models\Modelador;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use App\Models\File;
use App\Traits\Upload; //import the trait
use Illuminate\Support\Str;
/**
 * Class EtapaController
 * @package App\Http\Controllers
 */
class EtapaController extends Controller
{
    use Upload;
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
                        $agrupados[$etiqueta][$atributo] = "file";
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

        /* Invierte el orden de los elementos en la lista
        $Dependencias = array_reverse($modelos);

        // Itera sobre la lista invertida
        foreach ($Dependencias as $clave => $Models) {
            $etiquetaModel = $Models->etiqueta_modelo;
            $atributo = $agrupados[$etiquetaModel];
            $id=App::make($Models->modelo_tipo)::create($atributo);
            return response()->json($id);
        }*/

        $modelosIndexados = [];
        foreach ($modelos as $modelo) {
            $etiqueta = $modelo->etiqueta_modelo;
            $modelosIndexados[$etiqueta] = $modelo;
        }

        $Dependencias=json_decode($modeladorRaw->dependencia_guardado);

        foreach($Dependencias as $clave => $Models){
            $atributo = [];
            $etiquetaModel = $Models->etiqueta_modelo;
            $ClassModel = $modelosIndexados[$etiquetaModel]->modelo_tipo;

            if($agrupados[$etiquetaModel]['id'] == 'file'){
                //Subir Archivo al Servidor

                $path = $this->UploadFile($request->file($etiquetaModel."#id"), 2, 'public', $etiquetaModel.$agrupados['proceso']['id'].Str::random(10));
                $agrupados[$etiquetaModel]['path'] = $path;
            }

            foreach($Models->defecto as $defecto){
                $agrupados[$etiquetaModel][$defecto->atributo]= $defecto->valor;
            }

            foreach($Models->relaciones as $Relaciones){

                if($Relaciones->dependencia !== ''){
                    $referenciaModel = $Relaciones->modelo_referencia;
                    $refatributo = $Relaciones->atributo;
                    $valueRef = $agrupados[$referenciaModel][$refatributo];
                    $agrupados[$etiquetaModel][$Relaciones->dependencia]= $valueRef;
                }
            }

            $atributo=$agrupados[$etiquetaModel];
            unset($atributo['id']); // Olvido el ID, normalmente si no tiene referencia no debe existir

            $id=App::make($ClassModel)::create($atributo);
            $agrupados[$etiquetaModel]['id']= $id->id;

        }

        Etapa::create([
            'proceso_id' => $agrupados['proceso']['id'],
            'tipoetapas_id' => $tipoproceso,
            'estado_id' => 1,
        ]);

        //return response()->json($Dependencias);
        return redirect()->route('proceso.index',['nombre'=>$modeladorRaw->tipoetapa->tipoproceso->name])
        ->with('success', 'Etapa updated successfully');
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
    public function destroy_modular(Request $request, $tipoproceso)
    {
        $modeladorRaw = Modelador::where('tipoetapa_id',$tipoproceso)->first();
        $modelos = json_decode($modeladorRaw->modelo);
        $Dependencias=json_decode($modeladorRaw->dependencia_guardado);
        $global=  ["etapa"=>$tipoproceso,"proceso"=>$request['proceso#id']];
        $modelos = [];
        $params = [];
        foreach(json_decode($modeladorRaw->modelo,true) as $modelador){

            $paramb1 = array_map(function($item) use ($modelos,$global){
                $atributo = $item['metodo'];

                switch ($atributo) {
                case 'global':

                    return $global[$item['valor']];
                case 'ref':
                    return $modelos[$item['valor']]->getAttribute($item['atributo_ref']);
                case 'set':
                    return $item['valor'];
                default:
                    return null;
                }
            },
            $modelador['atributo_busqueda']);
            //$params[] = $paramb1;
            //$this->callback = $params;
            $modelos[$modelador['etiqueta_modelo']] = App::make($modelador['modelo_tipo'])::firstOrNew($paramb1);

        }


        foreach(array_reverse($Dependencias) as $nombre => $ModelBorrar){
            if(get_class($modelos[$ModelBorrar->etiqueta_modelo]) === 'App\Models\File'){
                $id = $modelos[$ModelBorrar->etiqueta_modelo]->id;
                $file = File::find($id);
                if (!is_null($file->path)) {
                    $this->deleteFile($file->path);
                }
                $file->delete();
            }
            $modelos[$ModelBorrar->etiqueta_modelo]->delete();
        }
        $modelos['etapa']->delete();

        return redirect()->route('proceso.index',['nombre'=>$modeladorRaw->tipoetapa->tipoproceso->name])
            ->with('success', 'Etapa deleted successfully');

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
