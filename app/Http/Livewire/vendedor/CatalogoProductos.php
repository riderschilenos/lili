<?php

namespace App\Http\Livewire\Vendedor;

use Livewire\Component;

class CatalogoProductos extends Component
{   public $pedido, $pedido_id, $file, $category_product, $selectedproduct, $selectedcategory, $producto_id, $products, $marcas, $selectedmarca, $modelos, $modelo_id;
    public $smartphones, $talla, $smartphone_id, $name, $numero, $detalle, $subtotal;

    public function render()
    {
        return view('livewire.vendedor.catalogo-productos');
    }

    public function category($suscripcion){
        
        $this->selectedcategory = $suscripcion;

        if($suscripcion=='carcasa'){
            $this->selectedcategory=1;
        }
        if($suscripcion=='accesorios'){
            $this->selectedcategory=2;
        }
        if($suscripcion=='ropa'){
            $this->selectedcategory=3;            
        }
    }
}
