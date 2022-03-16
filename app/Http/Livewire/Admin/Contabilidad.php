<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedido;
use App\Models\Suscripcion;
use Livewire\Component;

class Contabilidad extends Component
{
    public function render()
    {   $pedidos=Pedido::where('status',4)
        ->orwhere('status',5)
        ->orwhere('status',6)
        ->orwhere('status',7)
        ->orderby('status','DESC')
        ->get();

        $suscripcions=Suscripcion::all();

        return view('livewire.admin.contabilidad',compact('pedidos','suscripcions'));
    }
}
