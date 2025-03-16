<?php

namespace App\View\Components;

use App\Models\Rutafile;
use Illuminate\View\Component;

class FileUpload extends Component
{
    public $select;

    public $ruta;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ruta)
    {
        $this->select = Rutafile::all();
        $this->ruta = $ruta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $select = $this->select;

        return view('components.file-upload', compact('select'));
    }
}
