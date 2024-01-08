<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $productos = Producto::all();

        return view('admin.products.index',compact('productos'));
    }

    public function upload(Request $request, Producto $producto)
    {   
        //$this->authorize('dicatated',$serie);
      /*    
        
        $request->validate([
            'file'=>'required|image|max: 9216'
        ]);

        $images = $request->file('file')->store('vehiculos');

        //$url = Storage::url($images);

        $vehiculo->image()->create([
            'url'=>$images
        ]);

        return redirect()->route('garage.image',$vehiculo);
     */
        $request->validate([
            'file'=>'required|image'
        ]);
        
        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
        $ruta = public_path().'/storage/productos/'.$nombre;
        Image::make($request->file('file'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
        $producto->images()->create([
                    'url'=>'productos/'.$nombre
                ]);   
        if (IS_NULL($producto->image)) {
            $producto->update([
                'image'=>'productos/'.$nombre,
            ]);    
        }

        return redirect()->route('tiendas.productos.edit',$producto);

    }

    public function image(Request $request, Producto $producto)
    {   
        //$this->authorize('dicatated',$serie);
        
        
        $request->validate([
            'file'=>'required'
        ]);
        if($producto->image){
            Storage::delete($producto->image);
        }

        $foto = Str::random(10).$request->file('file')->getClientOriginalName();
        $rutafoto = public_path().'/storage/productos/'.$foto;
        $img=Image::make($request->file('file'))->orientate()
            ->resize(600, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutafoto);
        $img->orientate();

        $producto->update([
            'image'=>'productos/'.$foto,
        ]);    


        return redirect()->route('admin.products.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $disciplinas=Disciplina::pluck('name','id');
        $category_products=Category_product::pluck('name','id');
        return view('admin.products.create',compact('disciplinas','category_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'precio'=>'required'
        ]); 
        

        $producto = Producto::create([  'name'=>$request->name,
                                        'precio'=>$request->precio,
                                        'tienda_id'=>$request->tienda_id,
                                        'sku'=>$request->sku,
                                        'costo'=>$request->costo,
                                        'personalizable'=>$request->personalizable,]);
        
        if($request->file){
            if($producto->image){
                Storage::delete($producto->image);
            }
                                    
            $foto = Str::random(10).$request->file('file')->getClientOriginalName();
            $rutafoto = public_path().'/storage/productos/'.$foto;
            $img=Image::make($request->file('file'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
    
            $producto->update([
                'image'=>'productos/'.$foto,
            ]);   
        }
                                        
        if($request->creacion==1){
            return redirect()->route('tiendas.productos.edit',$producto);
        }else{
            return redirect()->route('admin.products.index')->with('info','El producto se creo con éxito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());

        return redirect()->back()->with('info','Producto actualizado con éxito.');
    }

    public function skugenerate(Request $request, Producto $producto)
    {   
        $slug=mt_rand(1000000000, 9999999999);
        $producto->update(['sku'=>$slug]);

        return redirect()->back()->with('info','SKU generado con éxito.');
    }

    public function printsku(Request $request, Producto $producto)
    {   $arrayNumeros = range(1, $request->cantidad);
        return view('admin.pedidos.etiquetasku', compact ('producto','arrayNumeros'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.products.index')->with('info','El productó se elimino con éxito.');

    }
}
