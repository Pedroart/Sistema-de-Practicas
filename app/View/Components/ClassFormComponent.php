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

    public $modelos;
    public $items;
    public $retorno;
    public $modo;
    public function __construct($modo,$tipoproceso,$global)
    {
        $this->modo = $modo;
        $modelos = [];
        $modelosRaw = Modelador::where('tipoproceso_id',$tipoproceso)->get();
        foreach($modelosRaw as $modelo){
            $data = json_decode($modelo->json_data);
            //array_keys(get_object_vars($data->origen))[0];
            $origen = $data->origen;

            $busqueda = array_map(function($item) use ($global,$modelos){
                $atributo = array_keys(get_object_vars($item))[0];
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
            },get_object_vars($origen));

            $modelos[$modelo->indicador] = App::make($modelo->model_type)::firstOrNew($busqueda);

            foreach($data->item as $clave => $valor){
                $valor->value = $modelos[$modelo->indicador]->getAttribute($clave);
                $this->items[$valor->grupo][$modelo->indicador.'.'.$clave] = $valor;
            }

        }
        $this->modelos = $modelos;
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
