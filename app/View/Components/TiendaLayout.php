<?php

namespace App\View\Components;

use App\Models\Pedido;
use Illuminate\View\Component;

class TiendaLayout extends Component
{   public $tienda,$pedidos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tienda)
    {
        $this->tienda = $tienda;
        $this->pedidos =$pedidos = Pedido::whereHas('ordens', function ($query) {
            $query->whereHas('producto', function ($queryProducto) {
                $queryProducto->where('tienda_id', $this->tienda->id);
            });
        })->where('status', '>=', 4)->get();
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
