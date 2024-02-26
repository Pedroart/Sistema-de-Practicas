<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavDropdown extends Component
{
    public $title;
    public $links;
    public $icon;

    public function __construct($icon,$title, $links)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->links = $links;
    }

    public function render()
    {
        return view('components.nav-dropdown');
    }
}
