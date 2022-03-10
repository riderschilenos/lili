<div>

    @php
    
    $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp

<div class="container py-8">

    <h1 class="text-center text-3xl font-bold py-6">Pedidos Pendientes de Producción</h1>

    @if($paginate==4)

        <h1 class="text-right pb-2 cursor-pointer" wire:click="updatepaginate">(Ver todos)</h1>
    @else
        <h1 class="text-right pb-2 cursor-pointer" wire:click="updatepaginate">(Resume)</h1>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 ">

        @foreach ($lotes as $lote)
        
            <label class="w-64 flex flex-col px-4 pb-6 pt-2 mb-3 bg-white text-blue rounded-lg shadow-lg  uppercase border border-blue hover:bg-blue ">
                <img class="ml-auto h-5 w-5 object-contain cursor-pointer" src="{{asset('img/home/check.png')}}" alt="" wire:click="close({{$lote}})" >

                <svg class="w-8 h-8 cursor-pointer hover:text-gray-500 mx-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" wire:click="download({{$lote}})">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                
                <span class="mt-2 text-base leading-normal text-center">Lote N° {{$lote->id}}</span>
                <div class="flex">
                    @foreach($lote->ordens as $orden)
                        <div class="p-1 mx-1 rounded-lg btn-danger ">
                            {{$orden->id}}
                        </div>
                    @endforeach
                </div>
                
            </label>
        
        
        @endforeach

    </div>
    

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
                                            @if($pedido->status==6)
                                                    <label>
                                                        <input type="checkbox" wire:model="selectedetiquetas" value="{{$pedido->id}}" class="mr-4 mt-2">
                                                    </label>
                                                @endif
                                    
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
  
                                <td class="px-6 py-4 text-center text-sm font-medium">
                                    @if ($pedido->status==6)
                                        <input wire:model="file" type="file" class="form-input bg-gray-200">
                                        
                                        <p class="text-indigo-600 hover:text-indigo-900 cursor-pointer"  wire:click="despachado({{$pedido}})">Despachado</p>
                                    @endif
                                    
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
                                                @if($orden->image)
                                                    <img class="h-18 w-24 object-contain justify-center mx-auto" src=" {{Storage::url($orden->image->url)}}" alt="">
                                                    
                                                @elseif($orden->status>=2)
                                                    <label>
                                                        <input type="checkbox" wire:model="selected" value="{{$orden->id}}" class="mr-4 mt-2">
                                                    </label>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                <label class="mx-4">{{$orden->id}}</label>
                                            </td>

                                          <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif ">
                                              
                                            {{$orden->producto->name}}
                                              
                                          </td>
              
                                          
                                            @if($orden->modelo)
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                    <div class="items-center">
                                                        <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                    <div class="items-center">
                                                        <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                    <div class="items-center">
                                                        <label class="mx-4">Sin Marca</label>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                    <div class="items-center">
                                                        <label class="mx-4">Sin Modelo</label>
                                                    </div>
                                                </td>
                                            @endif
        
                                            <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                <label class="mx-4">@if ($orden->name)
                                                    {{$orden->name}}
                                                    @else
                                                        -
                                                    @endif</label>
                                            </td>
        
                                            <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">    
              
                                                <label class="mx-4">
                                                    @if ($orden->numero)
                                                        {{$orden->numero}} 
                                                    @else
                                                        S/N
                                                    @endif</label>
                                                    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">    
              
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
                                    
                                                <p class="px-12 pb-4">¿Que desea realizar?</p>
                                                @foreach ($selected as $item)
                                                {{$item}}
                                                @endforeach
                                                <div class="form-group flex justify-center">
                                                    <div class="flex mr-4 form-check">
                                                        <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselecteddescartar">
                                                        <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                               ReDiseñar
                                                        </label>
                                                    </div>
                                                    <div class="flex form-check mr-4">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedproduccion">
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                        En caja
                                                    </label>
                                                    </div>
                                                    <div class="flex form-check">
                                                        <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselectedetiquetas">
                                                        <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                            Generar Etiquetas
                                                        </label>
                                                        </div>
                                                    
                                                    
                        
                        
                                                </div>
                                        
                        
                                        </div>
                                    @if(!is_null($descartar))

                                        <h1 class="text-center py-6">El pedido ira directamente a despacho</h1>

                                       

                                        <div class="flex justify-center">
                                            <button class="btn btn-primary text-sm" wire:click="rediseñar">Enviar</button>
                                        </div>
                               
                                    @elseif(!is_null($etiquetas))

                                    <h1 class="text-center py-6">¿Cuales etiquetas desea generar?</h1>
                                 
                                        @foreach ($selectedetiquetas as $item)
                                        {{$item}}
                                        @endforeach
                                        {!! Form::open(['route'=>'admin.generar.etiquetas', 'autocomplete'=>'off', 'method'=> 'GET' , 'target' => '_blank']) !!}
                                       
    
                                            
                                        @foreach ($selectedetiquetas as $item)
                                            <input type="hidden" name="selectedetiquetas[]" value="{{$item}}">
                                        @endforeach
                          
                
    
                                            
    
                                            <div class="flex justify-center">
                                                {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-16']) !!}
                                            </div>
                                        
                                        {!! Form::close() !!}
                                        



                                    @else

                                    
                                        <div class="h-32">
                                            <h1 class="text-xl font-bold text-center py-2 mt-4">Adjunte fotos si desea</h1>
                                            <hr class="w-full">
                                            <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200"> 
                                            @error('lote')
                                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                            @enderror

                                            
                                        </div>


                                        @foreach ($selected as $item)
                                            <input type="hidden" name="selected[]" value="{{$item}}">
                                        @endforeach

                                        <div class="flex justify-center">
                                            <button class="btn btn-primary" wire:click="encaja"> Enviar</button>
                                        </div>
                                    
                                 
                                    

                                    @endif
                               

                                
                                
                                    
                                    
                                       


                                   
                                
                    
                    </div>
                </div>
    
         
            </div>


  
</div>
 
    
</div>
