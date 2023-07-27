<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Category_product;
use App\Models\Marca;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\Smartphone;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogoProductos extends Component
{   use WithPagination;

    public $pedido, $pedido_id, $file, $category_product, $selectedproduct, $selectedcategory, $producto_id, $producto, $products, $marcas, $selectedmarca, $modelos, $modelo_id;
    public $smartphones, $talla, $smartphone_id, $name, $numero, $detalle, $subtotal;
   

    public function render()
    {   $ordens=Orden::where('id','>',0)->paginate(6);
        return view('livewire.vendedor.catalogo-productos',compact('ordens'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }

    public function category($suscripcion){
        
        $this->selectedcategory = Category_product::find($suscripcion);

        $this->products = Producto::where('category_product_id',$this->selectedcategory->id)->get();
    }

    public function producto($producto_id){
        
        $disciplina_id = Producto::find($producto_id)->disciplina_id;
        $category_product_id = Producto::find($producto_id)->category_product_id;
        $this->producto_id = $producto_id;
        $this->producto = Producto::find($producto_id);


        $this->marcas = Marca::where('disciplina_id',$disciplina_id)->get();
        
        if($category_product_id == 1){
            $this->smartphones = Smartphone::where('stock', '>=', 1)
                                            ->orderby('marcasmartphone_id','ASC')
                                            ->orderby('modelo','ASC')
                                            ->get();
        }
    
    }

    public function marca($marca_id){
        
        $this->marca_id = $marca_id;
        $this->selectedmarca=Marca::find($marca_id);
    }

    public function cancelcategory(){
        $this->reset(['selectedcategory','producto','producto_id','marcas','selectedmarca']);
    }

    public function cancelproducto(){
        $this->reset(['producto','producto_id','marcas','selectedmarca']);
    }

    public function cancelmarca(){
        $this->reset(['selectedmarca']);
    }


}
