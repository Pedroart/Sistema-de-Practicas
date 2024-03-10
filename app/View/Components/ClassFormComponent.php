<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClassFormComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $clase;
    public $propiedades;
    public $modo; // crear ver editar($role) borrar
    public $role;
    public function __construct($clase,$modo)
    {
        $this->modo = $modo;
        $this->clase = $clase;
        $this->propiedades = $clase::$showform;
        $this->role = (auth()->user()->hasRole('estudiante')) ? 'estudiante': 'docente';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.class-form-component',
            [
                'clase'=> $this->clase,
                'propiedades'=>$this->propiedades,
                'modo'=>$this->modo,
                'role'=>$this->role,
            ]
        );
    }
}
