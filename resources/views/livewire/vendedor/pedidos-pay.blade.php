<div class="container py-8">
            @php
                $total=0;
                $comisiones=0;
                $items=[];
                $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    
            @endphp
            @foreach ($pedidos as $pedido)
                @foreach ($items as $item)
                    @if($item==$pedido->id)
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
                        </th>
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
                                                        {!! Form::checkbox('items[]', $pedido->id, null, ['class' => 'mr-4 mt-2']) !!}
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
                                        
                                    </td>
                                </tr>
    
                        @endforeach
                    <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningun registro coincidente
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
                            <span class="text-gray-500">Pagos Pendientes</span>
                           
                            </div>
                        </div>
                        <div class="bg-white w-full rounded-xl p-6 shadow-lg flex items-center justify-around col-span-2">
                           
                            <div class="text-center">
                            
                           
                                    {!! Form::open(['route'=>'admin.qrregister.store']) !!}
                                        @csrf
                                        
                                        <div class="form-group">
                                 
                        
                                                <div class="form-group flex justify-center">
                                                    <div class="form-check">
                                                      <input type="radio" name="type" id="propio" value="5000">
                                                      <label for="propio" class="text-3xl font-bold text-gray-800">
                                                       Transferencia
                                                      </label>
                                                    </div>
                                                    <div class="ml-4 form-check">
                                                      <input type="radio" name="type" id="propio" value="10000">
                                                      <label for="propio" class="text-3xl font-bold text-gray-800">
                                                        MercadoPago
                                                      </label>
                                                    </div>
                                                    
                        
                        
                                                </div>
                                           
                        
                                        </div>
                                        
                                    {!! Form::close() !!}
                               
                            
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
            
    
                        @if ($pedidos->count())
                
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
                                        $counter=$pedidos->count();
                                    @endphp
                                   @foreach ($pedidos as $pedido)
                                   @php
                                       $counter-=1
                                   @endphp
                                    
                                            <tr>
                                                <td class="px-6 py-4 justify-center">
                                                    <p class="text-center">{{$counter+1}}</p>
                                                </td>
                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    
                                                    @switch($pedido->transportista->id)
                                                        @case(1)
                                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                MERCADOPAGO
                                                            </span>
                                                            @break
                                                        @case(2)
                                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                TRANSFERENCIA
                                                            </span>
                                                            @break
                                                            @case(3)
                                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                EFECTIVO
                                                            </span>
                                                            @break
                                                        
                                                        @default
                                                            
                                                    @endswitch
                                                    
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
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 ml-3">{{$pedido->Ordens->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                                    <div class="text-sm text-gray-500">Pedidos</div>
                                                </td>
                
                                                
                
                                                
                
                                                <td class="px-6 py-4 whitespace-nowrap">    
                
                                                    @switch($pedido->status)
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
                                                    
                                                </td>
                                            </tr>
                
                                    @endforeach
                                <!-- More people... -->
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay ningun registro coincidente
                            </div>
                        @endif 
                        
                    </x-table-responsive>

    
</div>