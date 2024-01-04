<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Producto;
use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoInteligente extends Component
{   use WithPagination;

    public $search;
    public $busqueda;
    public $product, $tienda;

    public function mount($producto){
        if ($producto) {
            $this->product=Producto::find($producto);
        }else{
            $this->product=null;
        }
       
    }
    public function render()
    {  $productos = Producto::where('name', 'LIKE', '%' . $this->search . '%')
        ->where('tienda_id',$this->product->tienda->id)
        ->orderByRaw("CASE 
                            WHEN personalizable = 'no' THEN 1 
                            WHEN personalizable = 'sí' THEN 2 
                            ELSE 3 
                        END")
        ->orderByDesc('stock') // Orden descendente por la columna 'stock'
        ->paginate(100);
        
        $disciplinas=Disciplina::pluck('name','id');
        $category_products=Category_product::pluck('name','id');

        return view('livewire.tienda.producto-inteligente',compact('productos','disciplinas','category_products'));
    }

    public function set_product($producto_id){
        $this->product=Producto::find($producto_id);
        if ($this->product->tienda_id) {
            $this->tienda=Tienda::find($this->product->tienda_id);
        } else {
            $this->tienda=Tienda::find(4);
        }
        
       
    }

    public function set_personalizadooff(Producto $producto){
        $producto->personalizable='no';
        $producto->save();
    }
    public function set_personalizadoon(Producto $producto){
        $producto->personalizable='si';
        $producto->save();
    }
    public function findProduct()
    {   if ($this->search) {
            $this->product = Producto::where('sku', $this->search)->first();
        }
            
        if($this->product){
            return redirect()->route('tiendas.productos.edit',$this->product);
            $this->resetSearch(); // Llama a la función para limpiar el campo de búsqueda
        }else{
            if($this->product){
                if ($this->product->tienda_id) {
                    $tienda=Tienda::find($this->product->tienda_id);
                } else {
                    $tienda=Tienda::find(4);
                }
                
                
            }else{
                $tienda=Tienda::find(4);
            }
            
            return redirect()->route('tiendas.productos.manual',$tienda)->with('sku',$this->search);;
        }
        
        
    }

    public function resetSearch()
    {   
        $this->reset('search');
    }
}
