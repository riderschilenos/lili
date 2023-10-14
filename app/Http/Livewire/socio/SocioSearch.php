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
                            ->paginate(16);

        
        return view('livewire.socio.socio-search',compact('socios','disciplinas','sociosfull'));
    }

    

    public function limpiar_page(){
        $this->resetPage();
    }
}
