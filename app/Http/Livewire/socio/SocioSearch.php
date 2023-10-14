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

    public $perPage = 10;
    public $loadedCount = 0;

    public function loadMore()
    {
        $this->perPage += 5;
    }
    
    public function render()
    {   
        $disciplinas = Disciplina::all();

        $sociosfull = Socio::all();

        $socios = Socio::select('socios.*')
                    ->where('rut', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('socios.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('socios.slug', 'LIKE', '%' . $this->search . '%')
                    ->orderByRaw("CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
                                CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
                                id DESC")
                    ->paginate($this->perPage);

        
        return view('livewire.socio.socio-search',compact('socios','disciplinas','sociosfull'));
    }

    

    public function limpiar_page(){
        $this->resetPage();
    }
}
