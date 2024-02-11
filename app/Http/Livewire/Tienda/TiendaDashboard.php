<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Suscripcion;
use App\Models\Ticket;
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
                $queryProducto->where('tienda_id', $this->tienda->id);
            })->where('status', '>=', 4)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();

        $pagos = Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->get(); 
            
        $pagos30=Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(29))
            ->get();

        if($this->tienda->id==4){
            $tickets30=Ticket::where('evento_id',13)
                ->where('created_at', '>=', now()->subDays(29))
                ->where('status','>=',3)->get();

            $suscripcions30=Suscripcion::where('suscripcionable_type','App\Models\Socio')
            ->where('created_at', '>=', now()->subDays(29))
            ->get();
            
            $sortedTickets30 = Ticket::where('evento_id', 23)
                ->where('created_at', '>=', now()->subDays(29))
                ->where('status', '>=', 3)
                ->get();

            $mergedResults = collect()
                            ->merge($tickets30->map(function ($ticket) {
                                $ticket['type'] = 'Desafio';
                                return $ticket;
                            }))
                            ->merge($suscripcions30->map(function ($suscripcion) {
                                $suscripcion['type'] = 'Suscripcion';
                                return $suscripcion;
                            }))
                            ->merge($pagos30->map(function ($pago) {
                                $pago['type'] = 'Pago';
                                return $pago;
                            }))
                            ->merge($sortedTickets30->map(function ($ticket) {
                                $ticket['type'] = 'Sorteo';
                                return $ticket;
                            }))
                            ->sortBy('created_at');

            $latest7 = $mergedResults->take(-7)->sortByDesc('created_at');

        }else{
            $tickets30=null;
            $sortedTickets30 =null;
            $suscripcions30=null;
            $latest7 =null;
        }
        

       
        $pagos7=Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(7))
            ->get();

        $pagos_anual=Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(330))
            ->get();
        $pagos_anteanual=Pago::whereHas('pedidos', function ($query) {
                $query->whereHas('ordens.producto', function ($queryProducto) {
                    $queryProducto->where('tienda_id', $this->tienda->id);
                })->where('status', '>=', 4);
            })
            ->where('created_at', '>=', now()->subDays(730))
            ->where('created_at', '<', now()->subDays(330))
            ->get();

        $now=now();

        return view('livewire.tienda.tienda-dashboard',compact('sortedTickets30','latest7','now','tickets30','suscripcions30','pedidostotal','pedidos','pagos','pagos7','pagos30','pagos_anual','pagos_anteanual'));
    }
}
