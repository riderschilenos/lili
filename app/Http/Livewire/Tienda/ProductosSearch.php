<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Invitado;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosSearch extends Component
{   use WithPagination;

    public function render()
    {   $invitados= Invitado::all();
        $socios= Socio::all();
        $pedidos = Pedido::whereHas('ordens', function ($query) {
                $query->whereHas('producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', 4);
                });
            })->where('status', '>=', 4)->paginate(50);

        $pagos = Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', 4);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(365))
            ->get();

        return view('livewire.tienda.productos-search',compact('pedidos','pagos','invitados','socios'));
    }
}
