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

    public function __construct($modo,$tipoproceso,$global)
    {
        $this->modo = $modo;
        $modeladorRaw = Modelador::where('tipoproceso_id',$tipoproceso)->first();
        $modelos = [];

        foreach(json_decode($modeladorRaw->modelo,true) as $modelador){

            $paramb1 = array_map(function($item) use ($modelos,$global){
                $atributo = array_keys($item)[0];

                switch ($atributo) {
                case 'global':
                    return $global[$item->global];
                case 'ref':
                    return $modelos[$item->ref]->getAttribute($item->atributo);
                case 'set':
                    return $item->set;
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
