<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Socio;
use App\Models\Transportista;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;



class PedidosCreate extends Component
{   
    public $invitados, $selectedSocios, $selectedInvitado, $selecteddespacho, $search, $socio_id, $invitado_id, $transportista_id, $transportistas;
    

    use WithPagination;


    public function render()
    {   
        
        $socios = Socio::join('users', 'socios.user_id', '=', 'users.id')
        ->select('socios.*', 'users.name', 'users.email', 'users.updated_at')
        ->where(function($query) {
            $search = $this->search;
            $query->where('rut', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('socios.name', 'LIKE', '%' . $search . '%')
                ->orWhere('users.name', 'LIKE', '%' . $search . '%')
                ->orWhere('socios.slug', 'LIKE', '%' . $search . '%');
                })
                ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
                CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
                CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
                id DESC")
                ->paginate(200);
        
        $guess = Invitado::where('rut','LIKE','%'. $this->search .'%')
                    ->orwhere('email','LIKE','%'. $this->search .'%')
                    ->orwhere('name','LIKE','%'. $this->search .'%')
                    ->orwhere('fono','LIKE','%'. $this->search .'%')
                    ->latest('id')
                    ->paginate(3);



        

        return view('livewire.vendedor.pedidos-create',compact('socios','guess'));
    }

    public function updateselectedSocios(Socio $socio){

        $this->selectedSocios= Socio::all();
        
        $this->reset(['invitados']);
    }

    public function updateselectedInvitado(Socio $socio){

        $this->invitados= Invitado::all();
        
        $this->reset(['selectedSocios']);
    }

    public function updatedselecteddespacho($selecteddespacho){
        
        if($selecteddespacho==1){
            $this->transportistas = Transportista::where('id',1)->pluck('name','id');
        }

        if($selecteddespacho==2){
            $this->transportistas = Transportista::where('id',1)
                                            ->orwhere('id',2)
                                            ->pluck('name','id');
        }
        if($selecteddespacho==3){
            $this->transportistas = Transportista::where('id',3)->pluck('name','id');
        }
        


    
    }

    public function updatesocio_id($socio_id){

        $this->reset(['invitados']);

        $this->selectedSocios= Socio::join('users','socios.user_id','=','users.id')
                            ->select('socios.*','users.name','users.email')
                            ->get();

        $this->socio_id = $socio_id;
        $this->resetPage();
         $this->reset(['search','invitados','invitado_id']);
    }

    public function updateinvitado_id($invitado_id){


        $this->invitado_id = $invitado_id;
        $this->resetPage();
         $this->reset(['search','selectedSocios','invitados','socio_id']);
    }



    public function cancel(){
        $this->reset(['selectedSocios','invitados','socio_id']);
    }

    public function resetsocio(){
        $this->reset(['socio_id','invitado_id']);
    }

    public function limpiar_page(){
        $this->resetPage();
        $this->reset(['selectedSocios','invitados','socio_id','invitado_id']);
    }

}
