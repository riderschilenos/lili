<x-vendedor-layout>

    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>

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

</x-vendedor-layout> 