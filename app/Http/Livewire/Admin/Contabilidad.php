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
    public $selectedperiodo;

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
        $suscripcion28=Suscripcion::all()->where('created_at', '>=', now()->subDays(28));


        $gastos=Gasto::all();
        $gastos7=Gasto::all()->where('created_at', '>=', now()->subDays(7));
        $gastos30=Gasto::all()->where('created_at', '>=', now()->subDays(30));
        $gastos_anual=Gasto::all()->where('created_at', '>=', now()->subDays(365));

        
        $pagos=Pago::all();
        $pagos7=Pago::all()->where('created_at', '>=', now()->subDays(7));
        $pagos30=Pago::all()->where('created_at', '>=', now()->subDays(28));
        $pagos_anual=Pago::all()->where('created_at', '>=', now()->subDays(365));

        $vendedors=Vendedor::all();

        $now=now();

        

        return view('livewire.admin.contabilidad',compact('pagos_anual','gastos_anual','suscripcion28','now','pedidos','suscripcions','gastos','pagos','gastos7','pagos7','gastos30','pagos30','vendedors'));
    }
}
