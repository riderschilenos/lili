<?php

namespace App\Http\Livewire\Socio;

use App\Models\Disciplina;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class SocioSearch extends Component
{   
    use WithPagination;

    public $search, $disciplina;
    
    public $perPagesoc = 10;
    public $loadedCount = 5;

    public function loadMore()
    {
        $this->perPagesoc += $this->loadedCount;
    }

    public function render()
    {   
        $disciplinas = Disciplina::all();

        $sociosfull = Socio::all();
       
            $sociosbici = Socio::join('users', 'socios.user_id', '=', 'users.id')
                ->select('socios.*', 'users.name', 'users.email', 'users.updated_at')
                ->where(function($query) {
                    $search = $this->search;
                    $query->where('rut', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('socios.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('socios.slug', 'LIKE', '%' . $search . '%');
                })
                ->whereIn('socios.disciplina_id', [2, 4, 5, 8, 10]) // Agregar esta línea para filtrar disciplina_id
                ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
                CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
                CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
                id DESC")
                ->paginate($this->perPagesoc);
          
            $sociosmoto = Socio::join('users', 'socios.user_id', '=', 'users.id')
                    ->select('socios.*', 'users.name', 'users.email', 'users.updated_at')
                    ->where(function($query) {
                        $search = $this->search;
                        $query->where('rut', 'LIKE', '%' . $search . '%')
                            ->orWhere('email', 'LIKE', '%' . $search . '%')
                            ->orWhere('socios.name', 'LIKE', '%' . $search . '%')
                            ->orWhere('users.name', 'LIKE', '%' . $search . '%')
                            ->orWhere('socios.slug', 'LIKE', '%' . $search . '%');
                    })
                    ->whereNotIn('socios.disciplina_id', [2, 4, 5, 8]) // Agregar esta línea para filtrar disciplina_id
                    ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
                    CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
                    CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
                    id DESC")
                    ->paginate($this->perPagesoc);
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
                ->paginate($this->perPagesoc);
     
        
       

        
        return view('livewire.socio.socio-search',compact('socios','sociosbici','sociosmoto','disciplinas','sociosfull'));
    }

    public function disciplina_update($disciplina){
        $this->disciplina=$disciplina;
    }

    public function disciplina_reset(){
        $this->disciplina=null;
    }
    

    public function limpiar_page(){
        $this->resetPage();
    }
}
