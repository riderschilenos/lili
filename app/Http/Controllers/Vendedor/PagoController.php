<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class PagoController extends Controller
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
        //
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
            'metodo'=>'required',
            'cantidad'=>'required',
            'user_id'=>'required'
            ]);
        
        if($request->comprobante){
                
                $foto = Str::random(10).$request->file('comprobante')->getClientOriginalName();
                $rutafoto = public_path().'/storage/comprobantes/'.$foto;
                $img=Image::make($request->file('comprobante'))->orientate()
                    ->resize(1200, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutafoto);
                $img->orientate();
                
            }else{
                $foto='';
            }
        $pago=Pago::create([
                'user_id'=> $request->user_id,
                'metodo'=> $request->metodo,
                'estado'=> $request->estado,
                'cantidad'=> $request->cantidad,
                'comprobante'=>'comprobantes/'.$foto]);

        
        foreach ($request->selected as $item){
            $pago->pedidos()->attach($item);
            $pedido = Pedido::find($item);
            $pedido->status = 3;
            $pedido->save();
        }
        
        return redirect()->route('vendedor.pedidos.prepay');
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

    public function adminindex()
    {   
        $pagos = Pago::where('estado',1)->paginate(8);

        return view('admin.pagos.index',compact('pagos'));
    }
    
    public function pagoaprov(Pago $pago){
            $pago->estado=2;
            $pago->save();
            foreach ($pago->pedidos as $pedido){
                $pedido->status=4;
                $pedido->save();
            }

            return redirect()->route('admin.pagos.index');
    
    }

}
