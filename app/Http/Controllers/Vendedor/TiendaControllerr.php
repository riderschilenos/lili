<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

class TiendaControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas=Disciplina::pluck('name','id');

        return view('tiendas.create',compact('disciplinas'));
    
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
            'nombre'=>'required',
            'fono'=>'required',
            'slug'=>'required|unique:tiendas',
            'ubicacion'=>'required'

        ]);

        $tienda = Tienda::create($request->all());

        Cache::flush();

        if($request->file('file')){
        
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = public_path().'/storage/tiendas/'.$nombre;
    
            Image::make($request->file('file'))->orientate()
                    ->resize(600, 600 , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            $tienda->update([
                        'logo'=>'tiendas/'.$nombre
                    ]);
            }

        return redirect()->route('tiendas.edit',$tienda);
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
    public function edit(Tienda $tienda)
    {
        return view('tiendas.edit',compact('tienda'));
    }

    public function productos(Tienda $tienda)
    {
        return view('tiendas.productos',compact('tienda'));
    }

    public function inteligente(Tienda $tienda)
    {
        return view('tiendas.cargainteligente',compact('tienda'));
    }
    public function manual(Request $request, Tienda $tienda)
    {   $disciplinas=Disciplina::pluck('name','id');
        $category_products=Category_product::pluck('name','id');
        
        return view('tiendas.cargamanual',compact('disciplinas','category_products','tienda'));
    }

    public function producto(Producto $producto)
    {   $disciplinas=Disciplina::pluck('name','id');
        $category_products=Category_product::pluck('name','id');
        if ($producto->tienda_id) {
            $tienda=Tienda::find($producto->tienda_id);
        } else {
            $tienda=Tienda::find(4);
        }
        
       

        return view('tiendas.editproduct',compact('disciplinas','category_products','producto','tienda'));
    }

    public function pedidos(Tienda $tienda)
    {
        return view('tiendas.pedidos',compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
