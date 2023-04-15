<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Cache;           

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (auth()->user()) {

            if (auth()->user()->vendedor) {

                if(auth()->user()->vendedor->estado==2){

                    $autos = Vehiculo::where('status',4)
                    ->orwhere('status',5)
                    ->orwhere('status',7)
                    ->latest('id')->get()->take(3);

                    if(Cache::has('series')){
                        $series = Cache::get('series');
                    }else{
                        $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
                        Cache::put('series',$series);
                    }


                    if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
            $riders = Socio::where('status',1)->orwhere('status',2)->latest('id')->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
                    {
                    if(auth()->user()->socio)
                    {
                    $socio2 = Socio::where('user_id',auth()->user()->id)->first();
                    }else{
                    $socio2=null;
                    }

                    }
                    else{
                    $socio2=null;
                    }

                    $disciplinas= Disciplina::pluck('name','id');
                    return view('vendedor.pedidos.index',compact('series','riders','autos','socio2','disciplinas'));
                    
                }else{
                    $disciplinas= Disciplina::pluck('name','id');
                    return view('vendedor.create',compact('disciplinas'));
                }
            }else{
                $disciplinas= Disciplina::pluck('name','id');
                return view('vendedor.create',compact('disciplinas'));
            }
            
        }else{
            $disciplinas= Disciplina::pluck('name','id');
            $id=10;
             return view('vendedor.create',compact('disciplinas','id'));
        }
        
    }

    public function prepay()
    {   if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
            $riders = Socio::where('status',1)->orwhere('status',2)->latest('id')->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');
                       
        
        return view('vendedor.pedidos.prepay',compact('socio2','disciplinas','riders','series','autos'));
    }

    public function view_update(Vendedor $vendedor)
    {   
        if($vendedor->view==1){
            $vendedor->view=0;
            $vendedor->save();
        }else{
            $vendedor->view=1;
            $vendedor->save();
        }

        //TOKEN QUE NOS DA FACEBOOK
        $token = 'EABVGwJYpNswBADWdwvyJ5GRKYMG8aekDZAaZBsmslIbZAZCkqQrH1r7QEDRqjp1h1ZBOBXtpda2rPZAOifZBgum7SW4ZAc5mLa5Vwmg9VsMD6o9YyM14FbHVBKboQEwQwpItjhPM1OZB5dMABAHc12fXier0ADLYDCSG8Cx2UWOcmEZCTpeZBVbjxE0bSpBhaZAKcQAXnGXZAUmPZCYAZDZD';
        $phoneid='100799979656074';
        $version='v16.0';
        $url="https://riderschilenos.cl/";
        $payload=[
            'messaging_product' => 'whatsapp',
            "preview_url"=> false,
            'to'=>'56963176726',
            
            'type'=>'template',
                'template'=>[
                    'name'=>'nuevo_pedido',
                    'language'=>[
                        'code'=>'es'],
                    'components'=>[ 
                        [
                            'type'=>'body',
                            'parameters'=>[
                                [
                                    'type'=>'text',
                                    'text'=> 'JUAN'
                                ],
                                [
                                    'type'=>'text',
                                    'text'=> 'DIEGO'
                                ],
                                [
                                    'type'=>'text',
                                    'text'=> '$10.000'
                                ]
                            ]
                        ]
                    ]
                ]
                
            
            
            /*
            "text"=>[
                "body"=> "Buena Rider, Bienvenido al club"
             ]*/
        ];
        
        Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();

            
        return redirect()->route('vendedores.index');
    }

    public function comisiones()
    {   if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
            $riders = Socio::where('status',1)->orwhere('status',2)->latest('id')->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');
        
        return view('vendedor.pedidos.comisiones',compact('socio2','disciplinas','riders','series','autos'));
    }

    public function precios()
    {                  
        $productos=Producto::all();
        return view('vendedor.pedidos.precios',compact('productos'));
    }

    public function catalogoscarcasas()
    {    if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
            $riders = Socio::where('status',1)->orwhere('status',2)->latest('id')->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');  

        return view('vendedor.catalogo.carcasas',compact('series','riders','autos','socio2','disciplinas'));
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
            'nro_cuenta'=>'required',
            'tipo_cuenta'=>'required',
            'rut'=>'required',
            'banco'=>'required',
            'name'=>'required',
            'fono'=>'required',
            'disciplina_id'=>'required',
            'localidad'=>'required',
        ]);

        $Vendedor = Vendedor::create([
            'nro_cuenta'=>$request->nro_cuenta,
            'tipo_cuenta'=>$request->tipo_cuenta,
            'rut'=>$request->rut,
            'banco'=>$request->banco,
            'user_id'=>$request->user_id,
            'biografia'=>'-',
            'name'=>$request->name,
            'fono'=>$request->fono,
            'disciplina_id'=>$request->disciplina_id,
            'localidad'=>$request->localidad,

        ]);

        return redirect()->route('vendedor.home.index');
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
    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();

        return redirect()->route('vendedor.home.index');
    }
}
