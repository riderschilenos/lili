<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gasto;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Suscripcion;
use App\Models\Vendedor;
use Livewire\Component;

class Contabilidad extends Component
{
    public function render()
    {   $pedidos=Pedido::where('status',4)
        ->orwhere('status',5)
        ->orwhere('status',6) 
        ->orwhere('status',7)
        ->orwhere('status',8)
        ->orwhere('status',9)
        ->orderby('status','DESC')
        ->get();

        $suscripcions=Suscripcion::all();

        $gastos=Gasto::all();
        
        $pagos=Pago::all();

        $vendedors=Vendedor::all();

        return view('livewire.admin.contabilidad',compact('pedidos','suscripcions','gastos','pagos','vendedors'));
    }
}
