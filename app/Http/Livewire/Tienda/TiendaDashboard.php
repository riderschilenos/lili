<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Tienda;
use Livewire\Component;

class TiendaDashboard extends Component
{   public $tienda;

    public function mount($tienda){
        $this->tienda=Tienda::find($tienda);
    }

    public function render()
    {   $pedidostotal = Pedido::whereHas('ordens', function ($query) {
                $query->whereHas('producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                });
            })->where('status', '>=', 4)->get();

        $pedidos = Pedido::whereHas('ordens.producto', function ($queryProducto) {
                $queryProducto->where('tienda_id', 4);
            })->where('status', '>=', 4)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();

        $pagos = Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(365))
            ->get();
        return view('livewire.tienda.tienda-dashboard',compact('pedidostotal','pedidos','pagos'));
    }
}
