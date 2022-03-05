<div class="container py-8">
    @php
        $total=0;
        $pendiente=0;
        $comisiones=0;
        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp
    @foreach ($pedidos as $pedido)
            
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

            @if($pedido->pedidoable_type=="App\Models\Socio")
                @if($pedido->status==2)
                    @foreach ($pedido->ordens as $orden)
                    @php
                        
                        $pendiente+=$orden->producto->precio-$orden->producto->descuento_socio;

                    @endphp    
                    @endforeach
                @endif

            @endif
            @if($pedido->pedidoable_type=="App\Models\Invitado")
                @if($pedido->status==2)
                    @foreach ($pedido->ordens as $orden)
                    @php
                        
                        $pendiente+=$orden->producto->precio;

                    @endphp    
                    @endforeach
                @endif

            @endif
            

    @endforeach


    <h1 class="text-center text-3xl font-bold pb-4">CATALOGO PRODUCTOS</h1>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">
        <article>
            <figure>
                <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/carcasas.jpg')}}" alt=""></a>
            </figure>

          
        </article>
        <article>
            <figure>
                <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/accesorios.jpg')}}" alt=""></a>
            </figure>
          
        </article>
        <article>
            <figure>
                <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/poleras.jpg')}}" alt=""></a>
            </figure>
           
        </article>
        <article>
            <figure>
                <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home3.jpeg')}}" alt=""></a>
            </figure>
            
        </article>
    
    </div>


            <div class="justify-between mt-4 grid grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="w-full rounded-xl flex items-center justify-around">
                        <a class="cursor-pointer text-gray-500 font-bold" wire:click="periodo">
                        @if ($periodo=="mensual")
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                        @else
                        <i class="fas fa-toggle-off text-2xl text-red-600"></i>
                        @endif
                        Anual/Mensual
                        </a>
                </div>
        
                <div class="w-full rounded-xl flex items-center justify-around">
                  
                </div>
        
                
        
                <div class="w-full rounded-xl flex items-center justify-around">
                   
                </div>
             
                
            </div>
            
    <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">

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
        </div>

        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="" src="https://i.imgur.com/Qnmqkil.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($pendiente)}}</h1>
              <span class="text-gray-500">Pagos Pendientes</span>
              <a href="{{route('vendedor.pedidos.prepay')}}">
              <span class="text-blue-500 font-bold">PAGAR</span></a>
            </div>
        </div>

        

        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="ml-6" src="https://i.imgur.com/dJeEVcO.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($comisiones)}}</h1>
              <span class="text-gray-500">Comisiones</span>
              <span class="text-blue-500 font-bold">RETIRAR</span>
            </div>
        </div>
        <!-- 

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

   <x-table-responsive>
      <div class="px-6 py-4 flex">
          <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre o rut del cliente">
          <a class="btn btn-success ml-2" href="{{route('vendedor.pedidos.create')}}">Nuevo Pedido</a>
      </div>

      @if ($pedidos->count())

          <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
              <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Cliente
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Transportista
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
                                      <div class="flex-shrink-0 h-10 w-10">
                                          @isset($pedido->image)
                                              <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                          @else
                                              <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                          @endisset
                                          
                                      </div>
                                      <div class="ml-4">
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

                            <td class="px-6 py-4 whitespace-nowrap">
                                
                                @switch($pedido->transportista->id)
                                      @case(1)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                      @case(2)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                        @case(3)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{$pedido->transportista->name}}
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

</div>
