<?php

namespace App\View\Components;

use App\Models\Modelador;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

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

    public function __construct($modo, $tipoproceso, $global)
    {
        $this->modo = $modo;
        $modeladorRaw = Modelador::where('tipoetapa_id', $tipoproceso)->first();
        $modelos = [];
        $params = [];
        foreach (json_decode($modeladorRaw->modelo, true) as $modelador) {

            $paramb1 = array_map(function ($item) use ($modelos, $global) {
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
            // $params[] = $paramb1;
            // $this->callback = $params;
            $modelos[$modelador['etiqueta_modelo']] = App::make($modelador['modelo_tipo'])::firstOrNew($paramb1);

        }
        foreach (collect(json_decode($modeladorRaw->item))->groupBy('grupo') as $grupo) {
            foreach ($grupo as $item) {
                $item->valor = $modelos[$item->etiqueta_modelo]->getAttribute($item->atributo);
                if ($item->tipo === 'selector') {
                    $item->list = App::make($item->selector)::all()->pluck('name', 'id');
                }
            }
            $this->items[$grupo->first()->grupo] = $grupo;
        }

        switch ($modo) {
            case 'delete':
                $this->bloqueado = true;
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

        // return json_encode($datos);
        return view('components.class-form-component', $datos);
    }
}
