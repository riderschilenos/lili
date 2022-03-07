<x-app-layout>
    @php
    
    $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp

<div class="container py-8">
    <h1 class="text-center text-3xl font-bold pb-4 py-6">Pedidos Pendientes de Diseño</h1>
    <x-table-responsive>
       
  
        @if ($pedidos->count())
  
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fono
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" >
                        Vendedor
                    </th>
                    
                    
                  
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fono
                        
                    </th>
                    
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Email
                        
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    
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
  
                              

                              <td class="text-center">
                                <div class="text-sm font-medium text-gray-900">
                                          
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                <a href="https://api.whatsapp.com/send?phone=569{{substr($socio->fono, -8)}}&text=Hola%20que%20tal" target="_blank">
                                                    {{$socio->fono}}<br>Cliente
                                                </a>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                <a href="https://api.whatsapp.com/send?phone=569{{substr($invitado->fono, -8)}}&text=Hola%20que%20tal" target="_blank">
                                                    {{$invitado->fono}} <br>Cliente
                                                </a> 
                                                @endif
                                        @endforeach
                                    @endif


                                  </div>
                              </td>
                              <td class="text-center text-sm">{{$pedido->vendedor->name}}</td>
                                
                                <td class="text-center text-sm">+56966996699 <br>Vendedor</td>
                                
                            
                              <td class="text-center">
                                <div class="text-sm font-medium text-gray-900">
                                          
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                <a href="mailto:{{$socio->user->email}}" target="_blank">
                                                    {{$socio->user->email}}
                                                </a>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                <a href="mailto:{{$invitado->email}} " target="_blank">
                                                    {{$invitado->email}} 
                                                </a> 
                                                @endif
                                        @endforeach
                                    @endif


                                  </div>

                              </td>
                             

                              <td class="px-6 py-4 whitespace-nowrap">
                                  
                              </td>
  
                                
  
                                
  
                        
                              
                              <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                  <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                              </td>
  
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('vendedor.pedidos.edit',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Diseñar</a>
                                  
                                </td>
                            </tr>
                            
                                @php
                                $counter=$pedido->ordens->count();
                                @endphp

                                    <tr class="bg-gray-300">
                                        <th >
                                            ORDENES
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nro
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Marca
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Modelo                        
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Número
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Detalle
                                        </th>
                                        
                                      
                                    </tr>
                                @foreach ($pedido->ordens->reverse() as $orden)
                                @php
                                    $counter-=1
                                @endphp

                                    <tr>
                                            <td class="text-center">
                                                <label>
                                                    <input type="checkbox" wire:model="selected" value="{{$pedido->id}}" class="mr-4 mt-2">
                                                </label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right bg-yellow-200">
                                                <label class="mx-4">{{$counter+1}}</label>
                                            </td>

                                          <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                              
                                            {{$orden->producto->name}}
                                              
                                          </td>
              
                                          
                                            @if($orden->modelo)
                                                <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                                    <div class="items-center">
                                                        <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                                    <div class="items-center">
                                                        <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                                    <div class="items-center">
                                                        <label class="mx-4">Sin Marca</label>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                                    <div class="items-center">
                                                        <label class="mx-4">Sin Modelo</label>
                                                    </div>
                                                </td>
                                            @endif
        
                                            <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">
                                                <label class="mx-4">@if ($orden->name)
                                                    {{$orden->name}}
                                                    @else
                                                        -
                                                    @endif</label>
                                            </td>
        
                                            <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">    
              
                                                <label class="mx-4">
                                                    @if ($orden->numero)
                                                        {{$orden->numero}} 
                                                    @else
                                                        S/N
                                                    @endif</label>
                                                    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap bg-yellow-200">    
              
                                                <label class="mx-4">
                                                    @if ($orden->detalle)
                                                        {{$orden->detalle}} 
                                                    @else
                                                        -
                                                    @endif</label>
                                                    
                                            </td>
                                          
                                         
              
                                            
                                         
                                        </tr>
              
                                @endforeach
                            <!-- More people... -->
                            
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
  <div class="justify-between mt-4 grid grid-cols-2 lg:grid-cols-2 gap-4">

    
                
                <div class="bg-white h-54 w-full rounded-xl p-6 shadow-lg flex items-center justify-around col-span-2">
                   
                    <div class="text-center">
                    
                   
                          
                         

                                    
                                
                                        <div class="form-group">
                                    
                                                <p class="px-12 pb-4">Selecciona el método de pago:</p>
                                                <div class="form-group flex justify-center">
                                                    <div class="flex form-check">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked >
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                        <img class="h-14 w-38 object-contain" src="{{asset('img/home/transferencia.png')}}" alt="">
                                                    </label>
                                                    </div>
                                                    <div class="flex ml-4 form-check">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" >
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                            <img class="h-14 w-38 object-contain" src="{{asset('img/home/mercadopago.png')}}" alt="">
                                                    </label>
                                                    </div>
                                                    
                        
                        
                                                </div>
                                        
                        
                                        </div>
                                        {!! Form::open(['route'=>'vendedor.pagos.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                        @csrf

                                            <div class="h-32">
                                                <h1 class="text-xl font-bold text-center py-2 mt-4">Adjunte los archivos diseñados</h1>
                                                <hr class="w-full">
                                                {!! Form::file('comprobante', ['class'=>'form-input w-full mt-6'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
                                                @error('foto')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror

                                                
                                            </div>

                                            {!! Form::hidden('user_id', Auth()->user()->id ) !!}
                
                                            {!! Form::hidden('metodo', 'TRANSFERENCIA' ) !!}

                                    

                                           
                                            

                                            {!! Form::hidden('estado', '1' ) !!}

                                            

                                            <div class="flex justify-center">
                                                {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                            </div>
                                        
                                        {!! Form::close() !!}
                            
                               
                            
                               

                                
                                
                                    
                                    
                                       


                                   
                                
                    
                    </div>
                </div>
    
         
            </div>


  
</div>
 
    
</x-app-layout>