<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavDropdown extends Component
{
    public $title;

    public $links;

    public $icon;

    public $permiso;

    public function __construct($permiso, $icon, $title, $links)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->links = $links;
        $this->permiso = $permiso;
    }

    public function render()
    {
        return view('components.nav-dropdown');
    }
}
