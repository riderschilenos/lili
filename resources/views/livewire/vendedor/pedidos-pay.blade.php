<div class="container py-8">
            @php
                $total=0;
                $comisiones=0;
                $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    
            @endphp
                @php
                // SDK de Mercado Pago
                require base_path('/vendor/autoload.php');
                // Agrega credenciales
                MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
            
              
                // Crea un objeto de preferencia
                $preference = new MercadoPago\Preference();
                if($pago){
                $item = new MercadoPago\Item();
                $item->title = 'Pago pedidos:';
                $item->quantity = 1;
                $item->unit_price = 100;
                }else{
                    $item = new MercadoPago\Item();
                    $item->title = 'Pago pedidos:';
                    $item->quantity = 1;
                    $item->unit_price = 100000;
                }
            
                $preference = new MercadoPago\Preference();
                //...
                if($pago){
                    $preference->back_urls = array(
                    "success" => route('payment.pago.active',$pago),
                    "failure" => "http://www.tu-sitio/failure",
                    "pending" => "http://www.tu-sitio/pending"
                    );
                
                }else{
                    $preference->back_urls = array(
                    "success" => "http://www.tu-sitio/failure",
                    "failure" => "http://www.tu-sitio/failure",
                    "pending" => "http://www.tu-sitio/pending"
                    );
                
                }
               
                
               
                $preference->auto_return = "approved";
            
                $preference->items = array($item);
                $preference->save(); 
                @endphp
            
                
            
            @foreach ($pedidos as $pedido)
                    @foreach ($selected as $item)
                        @if ($pedido->id==$item)
                            
                        
                            
                            
                            @if($pedido->pedidoable_type=="App\Models\Socio")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $total+=$orden->producto->precio-$orden->producto->descuento_socio;
            
                                @endphp    
                                @endforeach
            
                            @endif
                            @if($pedido->pedidoable_type=="App\Models\Invitado")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $total+=$orden->producto->precio;
            
                                @endphp    
                                @endforeach
            
                            @endif
            
                            @if($pedido->pedidoable_type=="App\Models\Socio")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $comisiones+=$orden->producto->comision_socio;
            
                                @endphp    
                                @endforeach
            
                            @endif
                            @if($pedido->pedidoable_type=="App\Models\Invitado")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $comisiones+=$orden->producto->comision_invitado;
            
                                @endphp    
                                @endforeach
            
                            @endif
                        @endif
                    @endforeach
            @endforeach
    
    
    
            
    
    
                    
            <h1 class="text-2xl text-red-600 text-center font-bold">PEDIDOS PENDIENTES DE PAGO</h1>
            <a href="{{route('vendedor.home.index')}}" class="font-bold text-lg cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800 mt-2 mb-4"></i> Listado de la pedidos</a>
            <p class="px-12">Selecciona los pedidos que deseas pagar.</p>
            
    
        <x-table-responsive>
            
    
            @if ($pedidos->count())
              
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cliente
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subtotal                        
                        </th>
                        {{-- comment
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Productos
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th> --}}
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
    
                       @foreach ($pedidos as $pedido)
    
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex h-10 w-10">
                                                @isset($pedido->image)
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                                @else
                                                    
                                                    <label>
                                                        <input type="checkbox" wire:model="selected" value="{{$pedido->id}}" class="mr-4 mt-2">
                                                    </label>
                                                    
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                                @endisset
                                                
                                            </div>
                                            <div class="ml-11">
                                            <div class="text-sm font-medium text-gray-900">
                                                
                                                @if($pedido->pedidoable_type=='App\Models\Socio')
                                                    @foreach ($socios as $socio)
                                                            
                                                            @if($socio->id == $pedido->pedidoable_id)
                                                                {{$socio->user->name}}
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    Socio
                                                                </span>
                                                            @endif
                                                    @endforeach
                                                @endif
                                                @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                    @foreach ($invitados as $invitado)
                                                            
                                                            @if($invitado->id == $pedido->pedidoable_id)
                                                                {{$invitado->name}} <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                    Invitado
                                                                </span>
                                                            @endif
                                                    @endforeach
                                                @endif
    
    
                                            </div>
                                            <div class="text-sm text-gray-500">
    
                                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                                        
                                                        @foreach ($socios as $socio)
                                                            @if(!is_null($socio->direccion))
                                                                @if($socio->id == $pedido->pedidoable_id)
                                                                    {{$socio->direccion->comuna.", ".$socio->direccion->region}} 
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
    
                                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                        @foreach ($invitados as $invitado)
                                                            
                                                                @if($invitado->id == $pedido->pedidoable_id)
                                                                
                                                                    @if(!is_null($invitado->direccion))
                                                                        {{$invitado->direccion->comuna.", ".$invitado->direccion->region}}
                                                                    @else
                                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                            FALTA DIRECCIÓN DE DESPACHO
                                                                        </span>
                                                                    @endif
                                                                
                                                                @endif
                                                            
                                                        @endforeach
                                                    @endif
    
                                            </div>
                                            </div>
                                        </div>
                                    </td>
    
                                    
                                    @php
                                    $subtotal=0;
                                    @endphp
    
                                    @if($pedido->pedidoable_type=="App\Models\Socio")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;
    
                                    @endphp    
                                    @endforeach
    
                                    @endif
                                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->precio;
    
                                    @endphp    
                                    @endforeach
    
                                    @endif
    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 ml-3">${{number_format($subtotal)}}</div>
                                        
                                    </td>
                                    
                                    {{-- comment
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 ml-3">{{$pedido->Ordens->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                        <div class="text-sm text-gray-500">Productos</div>
                                    </td>
    
                                    
    
                                    
    
                                    <td class="px-6 py-4 whitespace-nowrap">    
    
                                        @switch($pedido->status)
                                            @case(1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Borrador
                                                </span>
                                                @break
                                            @case(2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Pendiente de Pago
                                                </span>
                                                @break
                                            @case(3)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pendiente de Diseño
                                                </span>
                                                @break
                                            @case(4)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Despachado
                                                </span>
                                                @break
                                            @default
                                                
                                            @endswitch
                                            
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                        <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                    </td>
    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('vendedor.pedidos.edit',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                        
                                    </td> --}}
                                </tr>
    
                        @endforeach
                    <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay pedidos pendientes de pago
                </div>
            @endif 
            
        </x-table-responsive>
        <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
            {{-- comment
            
                        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                            <img class="" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                            <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-800">${{number_format($total)}}</h1>
                            <span class="text-gray-500">Venta 
                                @if ($periodo=="mensual")
                                Mes
                                @else
                                Anual
                                @endif</span>
                            </div>
                        </div> --}}
            
                        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                            <img class="h-24 w-24 p-2" src="{{asset('img/home/signopeso.png')}}" alt="" />
                            <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-800">${{number_format($total)}}</h1>
                            <span class="text-gray-500">Total Seleccionado</span>
                           
                            </div>
                        </div>
                        <div class="bg-white h-54 w-full rounded-xl p-6 shadow-lg flex items-center justify-around col-span-2">
                           
                            <div class="text-center">
                            
                           
                                  
                                        
                                        
                                    
                                        @if ($pago)
                                        <div class="card"><div class="card-body">
                                            
                                            <img class="h-14 w-38 object-contain" src="{{asset('img/home/mercadopago.png')}}" alt="">
                                            <h1 class="text-lg ml-2 text-center"><b>Pago Nro: {{$pagos->count()}}</b></h1>
                                            <article class="flex items-center">
                                                        <h1 class="text-lg ml-2"><b>Monto a pagar:</b></h1>
                                                        
                                                    
                                                        <p class="text-xl font-bold ml-auto">${{number_format($pago->cantidad)}}</p>
                                                    
                                            </article>
                                            
                                            <div class="cho-container flex justify-center mt-2 mb-4">
                                                <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                            </div>
                                            
                                        </div></div>

                                        
                                            



                                        @else
                                                <div class="form-group">
                                            
                                                        <p class="px-12 pb-4">Selecciona el método de pago:</p>
                                                        <div class="form-group flex justify-center">
                                                            <div class="flex form-check">
                                                            <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedtransferencia">
                                                            <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                                <img class="h-14 w-38 object-contain" src="{{asset('img/home/transferencia.png')}}" alt="">
                                                            </label>
                                                            </div>
                                                            <div class="flex ml-4 form-check">
                                                            <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselectedmercadopago">
                                                            <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                                    <img class="h-14 w-38 object-contain" src="{{asset('img/home/mercadopago.png')}}" alt="">
                                                            </label>
                                                            </div>
                                                            
                                
                                
                                                        </div>
                                                
                                
                                                </div>
                                                @if(!is_null($mercadopago))
                                                <div class="">
                                                    <h1 class="text-xl font-bold text-center py-2">Detalle de Pago:</h1>
                                                    <hr class="w-full">
                                                    <div>

                                                        <div class="card"><div class="card-body">
                                                            <article class="flex items-center">
                                                                        <h1 class="text-lg ml-2"><b>Monto a pagar:</b></h1>
                                                                        
                                                                    
                                                                        <p class="text-xl font-bold ml-auto">${{number_format($total)}}</p>
                                                                    
                                                            </article>
                                                            
                                                            {!! Form::open(['route'=>'vendedor.pagos.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                                @csrf

                                                                
                                                                    {!! Form::hidden('user_id', Auth()->user()->id ) !!}
                                        
                                                                    {!! Form::hidden('metodo', 'MERCADOPAGO' ) !!}

                                                                    {!! Form::hidden('cantidad', $total ) !!}

                                                                    @foreach ($selected as $item)
                                                                        <input type="hidden" name="selected[]" value="{{$item}}">
                                                                    @endforeach
                                                                    

                                                                    {!! Form::hidden('estado', '3' ) !!}

                                                                    

                                                                    <div class="flex justify-center">
                                                                        {!! Form::submit('Pagar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                                    </div>
                                                                
                                                            {!! Form::close() !!}
                                                            
                                                        </div></div>

                                                        
                                                
                                                    </div>

                                                </div>

                                            @else

                                    
                                            {!! Form::open(['route'=>'vendedor.pagos.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                            @csrf

                                                <div class="h-32">
                                                    <h1 class="text-xl font-bold text-center py-2 mt-4">Adjunte Comprobante por: ${{number_format($total)}}</h1>
                                                    <hr class="w-full">
                                                    {!! Form::file('comprobante', ['class'=>'form-input w-full mt-6'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
                                                    @error('foto')
                                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                                    @enderror

                                                    
                                                </div>

                                                {!! Form::hidden('user_id', Auth()->user()->id ) !!}
                    
                                                {!! Form::hidden('metodo', 'TRANSFERENCIA' ) !!}

                                                {!! Form::hidden('cantidad', $total ) !!}

                                                @foreach ($selected as $item)
                                                    <input type="hidden" name="selected[]" value="{{$item}}">
                                                @endforeach
                                                

                                                {!! Form::hidden('estado', '1' ) !!}

                                                

                                                <div class="flex justify-center">
                                                    {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                </div>
                                            
                                            {!! Form::close() !!}



                                     @endif
                                        @endif
                                       
                                    
                                       
                                    
                                       

                                        
                                        
                                            
                                            
                                               


                                           
                                        
                            
                            </div>
                        </div>
            
                        <!-- 
            
                        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                            <img class="ml-6" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                            <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-800">${{number_format($comisiones)}}</h1>
                            <span class="text-gray-500">Comisiones</span>
                            <span class="text-blue-500 font-bold">RETIRAR</span>
                            </div>
                        </div>
                        
            
                        <div class="bg-white w-1/3 rounded-xl shadow-lg flex items-center justify-around">
                            
                            <div class="text-center">
                                <span class="text-gray-500">BONO</span>
                                <h1 class="text-4xl font-bold text-gray-800">$500.000</h1>
                                <span class="text-gray-500">En ventas</span>
                            </div>
                            <div class="text-center">
                                <img src="https://static.vecteezy.com/system/resources/previews/001/609/741/non_2x/padlock-security-symbol-isolated-cartoon-free-vector.jpg" class="h-20" alt="" />
                                <span class="text-gray-500">MAS INFO</span>
                            </div>       
                        </div>
                        -->
                        
                    </div>
                    <h1 class="text-3xl text-gray-800 text-center font-bold py-8">Historial de Pagos</h1>
            
                    <x-table-responsive>
                        
                        
                       
                        @if ($pagos->count())
                
                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    Nro
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Método
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cantidad                       
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pedidos
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $counter=$pagos->count();
                                    @endphp
                                   @foreach ($pagos as $pago)
                                        @php
                                            $counter-=1
                                        @endphp
                                    @if ($pago->estado!=3)
                                        
                                    
                                        
                                    
                                            <tr>
                                                <td class="px-6 py-4 justify-center">
                                                    <p class="text-center">{{$counter+1}}</p>
                                                   
                                                </td>
                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    
                                                    @if ($pago->metodo=='Mercadopago')
                                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            MERCADOPAGO
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            TRANSFERENCIA
                                                        </span>
                                                   
                                                    @endif
                                                          
                                                    
                                                </td>
                
                                               
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900 ml-3">${{number_format($pago->cantidad)}}</div>
                                                    
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 ml-3">{{$pago->pedidos->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                                    <div class="text-sm text-gray-500">Pedidos</div>
                                                </td>
                
                                                
                
                                                
                
                                                <td class="px-6 py-4 whitespace-nowrap">    
                
                                                    @switch($pago->estado)
                                                        @case(1)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                Pendiente
                                                            </span>
                                                            @break
                                                        @case(2)
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Aprobado
                                                            </span>
                                                            @break
                                                       
                                                            
                                                        @endswitch
                                                        
                                                </td>
                                                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pago->created_at))-1]}}</div>
                                                    <div class="text-sm text-gray-900">{{$pago->created_at->format('d-m-Y')}}</div>    
                                                </td>
                
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{route('vendedor.pedidos.edit',$pago)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                                    
                                                </td>
                                            </tr>
                                    @endif
                                    @endforeach
                                <!-- More people... -->
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay ningun registro de pago realizado
                            </div>
                        @endif 
                        
                    </x-table-responsive>
                    
                    <script src="https://sdk.mercadopago.com/js/v2"></script>
                    <script>
                        // Agrega credenciales de SDK
                        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                                locale: 'es-AR'
                        });
                        
                        // Inicializa el checkout
                        mp.checkout({
                            preference: {
                                id: '{{ $preference->id }}'
                            },
                            render: {
                                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
                            }
                        });
                    </script>
    
</div>