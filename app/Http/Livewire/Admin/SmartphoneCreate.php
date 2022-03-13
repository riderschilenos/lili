<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Marca;
use App\Models\Marcasmartphone;
use Livewire\Component;

class SmartphoneCreate extends Component
{   public $selectedcategory;

    public $selectedmarca;

    public function render()
    {   $disciplinas=Disciplina::all();

        $marcas = Marcasmartphone::all();

        $category_products=Category_product::all();

        return view('livewire.admin.smartphone-create',compact('disciplinas','category_products','marcas'));
    }


    public function updatedselectedmarca($marca){
        
        $this->selectedmarca=$marca;
    
    }
}
