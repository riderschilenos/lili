<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Category_product;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Smartphone;
use Livewire\Component;

class CatalogoProductos extends Component
{   public $pedido, $pedido_id, $file, $category_product, $selectedproduct, $selectedcategory, $producto_id, $producto, $products, $marcas, $selectedmarca, $modelos, $modelo_id;
    public $smartphones, $talla, $smartphone_id, $name, $numero, $detalle, $subtotal;

    public function render()
    {
        return view('livewire.vendedor.catalogo-productos');
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


}
