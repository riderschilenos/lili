<?php

namespace App\Http\Livewire\Socio;

use App\Models\Disciplina;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class SocioSearch extends Component
{   
    use WithPagination;

    public $search;
    
    public function render()
    {   
        $disciplinas = Disciplina::all();

        $sociosfull = Socio::all();

        $socios = Socio::join('users','socios.user_id','=','users.id')
                    ->select('socios.*','users.name','users.email','users.profile_photo_path')
                    ->where('rut','LIKE','%'. $this->search .'%')
                    ->orwhere('email','LIKE','%'. $this->search .'%')
                    ->orwhere('socios.name','LIKE','%'. $this->search .'%')
                    ->orwhere('users.name','LIKE','%'. $this->search .'%')
                    ->orwhere('socios.slug','LIKE','%'. $this->search .'%')
                    ->orderby('users.profile_photo_path','DESC')
                    ->orderby('socios.updated_at','DESC')
                    ->paginate(50);

        
        return view('livewire.socio.socio-search',compact('socios','disciplinas','sociosfull'));
    }

    

    public function limpiar_page(){
        $this->resetPage();
    }
}
