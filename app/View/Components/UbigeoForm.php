<?php

namespace App\View\Components;
use Illuminate\View\Component;
use App\Http\Controllers\Api\UbigeoController;

class UbigeoForm extends Component

{
    public $bloqueado;
    public $lista_departamento;
    public $lista_provincia;
    public $lista_distrito;

    public $indi_departamento;
    public $indi_provincia;
    public $indi_distrito;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null,$bloqueado = FALSE)
    {
        $this->bloqueado = $bloqueado;

        $this->lista_departamento=array();
        $this->lista_provincia=array();
        $this->lista_distrito=array();

        $this->indi_departamento=null;
        $this->indi_provincia=null;
        $this->indi_distrito=null;

        if(!is_null($id)){
            $controller = new UbigeoController();
            $data = $controller->consolidad($id);
            $this->lista_departamento = [ $data['departamento']['id'] => $data['departamento']['nombre'] ];
            $this->indi_departamento = $data['departamento']['id'];

            $this->lista_provincia = [ $data['provincia']['id'] => $data['provincia']['nombre'] ];
            $this->indi_provincia = $data['provincia']['id'];

            $this->lista_distrito = [ $data['distrito']['id'] => $data['distrito']['nombre'] ];
            $this->indi_distrito = $data['distrito']['id'];
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.ubigeo-form');
    }

}
