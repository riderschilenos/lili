<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Invitado;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosSearch extends Component
{   use WithPagination;
    public $tienda;

    public function mount($tienda){
        $this->tienda=Tienda::find($tienda);
    }

    public function render()
    {   $invitados= Invitado::all();
        $socios= Socio::all();
        $pedidos = Pedido::whereHas('ordens', function ($query) {
            $query->whereHas('producto', function ($queryProducto) {
                $queryProducto->where('tienda_id', $this->tienda->id);
            });
                })->where('status', '>=', 4)
                ->orderBy('id', 'desc')
                ->paginate(50);
        $pedidosall = Pedido::whereHas('ordens', function ($query) {
                $query->whereHas('producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                });
            })->where('status', '>=', $this->tienda->id)->get();

        $pedidos30=Pedido::whereHas('ordens.producto', function ($queryProducto) {
                $queryProducto->where('tienda_id', 4);
            })->where('status', '>=', 4)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();    

        $pagos = Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', $this->tienda->id);
            })
            ->where('created_at', '>=', now()->subDays(365))
            ->get();

        return view('livewire.tienda.productos-search',compact('pedidos','pedidosall','pedidos30','pagos','invitados','socios'));
    }
}
