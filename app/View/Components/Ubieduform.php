<?php

namespace App\View\Components;

use App\Http\Controllers\Api\UbieduController;
use Illuminate\View\Component;

class Ubieduform extends Component
{
    public $bloqueado;

    public $lista_facultad;

    public $lista_departamento;

    public $lista_escuela;

    public $indi_facultad;

    public $indi_departamento;

    public $indi_escuela;

    public $prefijo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $bloqueado = false, $prefijo = null)
    {
        $this->lista_facultad = [];
        $this->lista_departamento = [];
        $this->lista_escuela = [];
        $this->indi_facultad = null;
        $this->indi_departamento = null;
        $this->indi_escuela = null;
        $this->prefijo = $prefijo;

        $this->bloqueado = $bloqueado;

        if (! is_null($id)) {
            $controller = new UbieduController();
            $data = $controller->consolidado($id);
            $this->lista_facultad = [$data['facultad']['id'] => $data['facultad']['nombre']];
            $this->indi_facultad = $data['facultad']['id'];

            $this->lista_departamento = [$data['departamento']['id'] => $data['departamento']['nombre']];
            $this->indi_departamento = $data['departamento']['id'];

            $this->lista_escuela = [$data['escuela']['id'] => $data['escuela']['nombre']];
            $this->indi_escuela = $data['escuela']['id'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ubieduform');
    }
}
