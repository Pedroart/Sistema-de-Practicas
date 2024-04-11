<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\Modelador;

class ClassFormComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $modo;
    public $items;
    public $callback;
    public $bloqueado;

    public function __construct($modo,$tipoproceso,$global)
    {
        $this->modo = $modo;
        $modeladorRaw = Modelador::where('tipoetapa_id',$tipoproceso)->first();
        $modelos = [];


        foreach(json_decode($modeladorRaw->modelo,true) as $modelador){

            $paramb1 = array_map(function($item) use ($modelos,$global){
                $atributo = $item['metodo'];

                switch ($atributo) {
                case 'global':
                    $this->callback = $global;
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
            $modelos[$modelador['etiqueta_modelo']] = App::make($modelador['modelo_tipo'])::firstOrNew($paramb1);

        }
        foreach(collect(json_decode($modeladorRaw->item))->groupBy('grupo') as $grupo){
            foreach($grupo as $item){
                $item->valor = $modelos[$item->etiqueta_modelo]->getAttribute($item->atributo);
            }
            $this->items[$grupo->first()->grupo] = $grupo;

        }


        switch($modo){
            case 'edit':
                $this->bloqueado = false;
                break;
            case 'show':
                $this->bloqueado = true;
                break;
            case 'create':
                $this->bloqueado = false;
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datos = get_object_vars($this);
        return view('components.class-form-component', $datos);
    }
}
