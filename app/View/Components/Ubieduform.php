<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\Api\UbieduController;

class Ubieduform extends Component
{
    public $bloqueado;
    public $lista_facultad;
    public $lista_departamento;
    public $lista_escuela;

    public $indi_facultad;
    public $indi_departamento;
    public $indi_escuela;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null,$bloqueado = FALSE)
    {
        $this->lista_facultad=array();
        $this->lista_departamento=array();
        $this->lista_escuela=array();
        $this->indi_facultad=null;
        $this->indi_departamento=null;
        $this->indi_escuela=null;
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
