<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TiendaLayout extends Component
{   public $tienda;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tienda)
    {
        $this->tienda = $tienda;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.tienda');
    }

   
}
