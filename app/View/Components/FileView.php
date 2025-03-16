<?php

namespace App\View\Components;

use App\Models\File;
// import the trait
use Illuminate\View\Component;

class FileView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;

    public $archivo;

    public $patch;

    public function __construct($id)
    {
        $this->id = $id;
        $this->archivo = File::find($id);
        $this->patch = $this->archivo->path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datos = get_object_vars($this);

        return view('components.file-view', $datos);
    }
}
