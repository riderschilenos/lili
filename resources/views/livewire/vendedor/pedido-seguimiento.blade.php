<div>
    

<script>//<![CDATA[
function getlink() {
var aux = document.createElement("input");
aux.setAttribute("value", window.location.href.split("?")[0].split("#")[0]);
document.body.appendChild(aux);
aux.select();
document.execCommand("copy");
document.body.removeChild(aux);
var css = document.createElement("style");
var estilo = document.createTextNode("#aviso {position:fixed; z-index: 9999999; widht: 120px; top:30%;left:50%;margin-left: -60px;padding: 20px; background: gold;border-radius: 8px;font-size: 14px;font-family: sans-serif;}");
css.appendChild(estilo);
document.head.appendChild(css);
var aviso = document.createElement("div");
aviso.setAttribute("id", "aviso");
var contenido = document.createTextNode("URL copiada");
aviso.appendChild(contenido);
document.body.appendChild(aviso);
window.load = setTimeout("document.body.removeChild(aviso)", 2000);
}
//]]></script>
<div class="hidden sm:block">
    <div class="flex justify-end">
        <a class="btn btn-danger flex" href='javascript:getlink();'><img class="h-4 w-4 mt-1 mr-2" src="https://img.icons8.com/ios-filled/50/ffffff/copy.png"/> Copiar URL</a>
    </div>
</div>
    <h1 class="text-3xl text-center font-bold pb-6">Estado del Pedido<br>Nro: {{$pedido->id}}</h1>
    
    <div class="w-full pt-6 pb-12">
        <div class="flex">
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-white w-full">
                  <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                  </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Información</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded transition-all duration-500" style="width: 0%;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-gray-600 w-full ml-1">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Fotos</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-gray-600 w-full">
                  <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                  </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Precio/Comisión</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-gray-600 w-full">
                  <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                  </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Publicación</div>
          </div>
        </div>
      </div>



    <div class="hidden sm:flex">
        <h1 class="text-xl font-bold">INFORMACIÓN DE DESPACHO</h1>

        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    
                        <p class="ml-auto font-bold mr-4">Nombre:</p>{{$invitado->name}}
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Invitado
                        </span>
                        <p class="ml-auto font-bold mr-4">Rut:</p>{{$invitado->rut}}

                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )

                        <p class="ml-auto mr-4 font-bold">Nombre:</p>{{$socio->user->name}}
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-green-100 text-green-800">
                            Socio
                        </span>
                        <p class="ml-auto mr-4 font-bold">Rut:</p>{{$socio->rut}}
                       

                @endif
            @endforeach
        @endif

    </div>
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 sm:hidden ">
        <h1 class="text-xl font-bold col-span-3">INFORMACIÓN DE DESPACHO</h1>

        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    <div class="col-span-3">
                        <p class="ml-auto font-bold mr-4">Nombre:</p>{{$invitado->name}}
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Invitado
                        </span>
                        <p class="ml-auto font-bold mr-4">Rut:</p>{{$invitado->rut}}
                    </div>
                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )

                        <p class="ml-auto mr-4 font-bold">Nombre:</p>{{$socio->user->name}}
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-green-100 text-green-800">
                            Socio
                        </span>
                        <p class="ml-auto mr-4 font-bold">Rut:</p>{{$socio->rut}}
                       

                @endif
            @endforeach
        @endif

    </div>



    <hr class="mt-2 mb-6">

   
        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    @if ($invitado->direccion)

                        <div class="flex gap-10" name="datosdireccioninvitado">
                            <div>
                                <p class="font-bold mr-2s">Comuna: </p>{{$invitado->direccion->comuna}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Calle: </p>{{$invitado->direccion->calle}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Nro: </p>{{$invitado->direccion->numero}}
                            </div>
                            <div>
                                <p class="font-bold mr-2">{{$invitado->direccion->region}}</p>
                            </div>
                            <div>
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
                                
                            </div>    
                        </div>
                        
                        <div class="mt-4" name="productos">
                            @livewire('vendedor.pedidos-ordens', ['pedido' => $pedido], key('pedidos-ordens.'.$pedido->id))
                        </div>

                        
                        
                        
                    @else

                        <div name="formulariodireccioninvitados">
                            <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una direccion de despacho antes de agregar los productos al pedido</h1>
            
                            
                            {!! Form::open(['route' => 'vendedor.direccions.store']) !!}

                            {!! Form::hidden('pedido_id', $pedido->id ) !!}
                    
                            {!! Form::hidden('direccionable_id', $pedido->pedidoable_id ) !!}

                            {!! Form::hidden('direccionable_type','App\Models\Invitado') !!}
                            
                            @include('vendedor.pedidos.partials.formdirection')
                    
                    
                            <div class="flex justify-end">
                                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                                {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                            </div>
                    
                            {!! Form::close() !!}
                        </div>



                    @endif
                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )
                    @if ($socio->direccion)

                        <div class="flex gap-10" name="datosdireccionsocio">
                            <div>
                                <p class=" ml-auto font-bold mr-2">Comuna: </p>{{$socio->direccion->comuna}}
                            </div>
                            <div>
                                <p class="ml-auto font-bold mr-2">Calle: </p>{{$socio->direccion->calle}}
                            </div>
                            <div>
                                <p class="ml-auto font-bold mr-2">Nro: </p>{{$socio->direccion->numero}}
                            </div>
                            <div>
                                <p class="font-bold mr-2">{{$socio->direccion->region}}</p>
                            </div>
                            <div>
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
                                
                            </div>
                        </div>
                        
                        <div class="mt-4" name="productos">

                            @livewire('vendedor.pedidos-ordens', ['pedido' => $pedido], key('pedidos-ordens.'.$pedido->id))
                            
                        </div>
                        
                        
                    @else
                    
                        <div name="formulariodireccionsocios">

                            <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una direccion de despacho antes de agregar los productos al pedido</h1>
            

                            
                            {!! Form::open(['route' => 'vendedor.pedidos.store']) !!}
                    
                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                    
                            {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}
                    
                            @include('vendedor.pedidos.partials.formdirection')
                    
                    
                            <div class="flex justify-end">
                                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                                {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                            </div>
                    
                            {!! Form::close() !!}
                    
                        </div>



                    @endif
                @endif
            @endforeach
        @endif
        
    
  
    
    

   

    
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>

</div>
