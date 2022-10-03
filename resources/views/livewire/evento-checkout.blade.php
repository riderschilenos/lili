<div>

<div class="hidden">
    {{$total=0;}}     
    {{$valor=0;}}
         
</div>
@foreach ($evento->fechas as $fecha)                                                        
    @foreach ($fecha->categorias as $const)
        @foreach($const->inscripcions as $inscripcion)
            @php
                $total+=$inscripcion->fecha_categoria->inscripcion;

                $valor+=$inscripcion->fecha_categoria->valor;

            @endphp
        @endforeach
    @endforeach
@endforeach

    @php

        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

      
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Inscripción '.$evento->titulo;
        $item->quantity = 1;
        $item->unit_price = $valor;

        

        $preference = new MercadoPago\Preference();
        //...
        if($ticket){
        $preference->back_urls = array(
            "success" => route('payment.ticket', $ticket,$evento),
            "failure" => route('checkout.evento', $evento),
            "pending" => route('checkout.evento', $evento)
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
        }
    @endphp

<style>
    
    scroll-container {
      display: block;
      width: 100%;
      height: 200px;
      overflow-y: scroll;
      scroll-behavior: smooth;
      background: #ffffff;
      padding-left: 0.5rem;
    }
    scroll-page {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      height: 100%;
      font-size: 5em;
    }
        </style>


    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        
            <h1 class="text-gray-500 text-3xl font-bold mx-2 text-center mb-4">Proceso de Inscripción</h1>

            <div class="mx-2 card text-gray-600">
                <div class="card-body">
                    <article class="grid grid-cols-1 md:grid-cols-2 items-center">
                        <div class="flex">
                            <img class="h-28 w-24 object-cover" src="{{Storage::url($evento->image->url)}}" alt="">
                            <div class="ml-2 mt-5">
                                <h1 class="text-lg ml-2">{{$evento->titulo}}</h1>
                                <h2 class="text-md ml-2 mb-3">{{$evento->subtitulo}}</h2>
                            </div>
                        </div>
                        <div class="">
                            @php
                            $min=0;
                            $max=0;
                        @endphp
                        @foreach ($fechas as $fecha)
                            @foreach($fecha->categorias as $categoria)
                                @php
                                    if ($min==0) {
                                        $min=$categoria->inscripcion;
                                        $max=$categoria->inscripcion;
                                    }else{
                                        if ($categoria->inscripcion<$min) {
                                            $min=$categoria->inscripcion;
                                        }elseif($categoria->inscripcion>$max){
                                            $max=$categoria->inscripcion;
                                        }
                                    }
                                
                                @endphp    
                            @endforeach
                        @endforeach
                            <div class="mx-24 grid grid-cols-1 md:grid-cols-1 w-full">
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                
                                    <div class="flex mx-auto mb-4 w-72   px-24">
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full">
                                            @if ($min==0)
                                                <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                            @else
                                                <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($min)}}</p>
                                            @endif
                                            <p class="text-gray-500 text-sm text-center">Niños</p> 
                                        </div>
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                            <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($max)}}</p>
                                            <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                        </div>
                                        
                                    </div>
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                
                                    <div class="flex mx-auto mb-4 w-72   px-24">
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full">
                                            @if ($evento->entrada_niño==0)
                                                <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                            @else
                                                <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada_niño)}}</p>
                                            @endif
                                            <p class="text-gray-500 text-sm text-center">Niños</p> 
                                        </div>
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                            <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada)}}</p>
                                            <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                    </article>
                
                    <hr>

                    <p class="text-sm mt-4">{!!$evento->descripcion!!}</p>
                </div>
            </div>

            

        <div class="mx-2 mt-6 grid grid-cols-1 gap-y-4 xl:mt-12" x-data="condiciones:false">
            <section id="datos">   
                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if (IS_NULL($socio)) text-blue-600 @else text-green-600 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>

                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="px-2 text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">1) Datos del Competidor</h2>
                                
                            </div>

                        
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-500 sm:text-4xl dark:text-gray-300"><span class="text-base font-medium">Editar</span></h2>
            
                    
                    </div>


                        
                        @if (!IS_NULL($socio))
                            <div class="flex justify-between items-center mx-auto my-4 bg-gray-100 rounded-lg pb-6 max-w-2xl">
                                <p class="mx-auto items-center mt-6 text font-bold flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 w-9 h-9 text-blue-600 my-auto mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg> Sus datos estan Registrados</p>
                                <div style="line-height: 1.3rem;" class="mx-auto mt-6 pr-8">
                                    <h1 style="font-size: 1.5rem;" class="text-center font-bold">{{$socio->name}} </h1>
                                    <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center font-bold inline w-full" >{{$socio->rut}} </h1>
                                  
                                </div>
                            </div>

                        @else
                            
                                
                                    <div class="flex items-center pb-6 lg:pt-5 pt-2 px-8">
                                        <div class="w-full">

                                            

                                        

                                            <p class="text-xl leading-normal text-gray-800 dark:text-white">Bienvenido {{auth()->user()->name}}, a continuacion ingresaras los datos para tu primera inscripción en RidersChilenos, con esta Información ademas de proporcionarte la inscripción para este evento te entregaremos un perfil donde podras llevar todo el historial de tu carrera deportiva</p>
                                        
                                        </div>
                                    </div>

                                    <hr class="mt-2 mb-4">

                              
                                
                                {!! Form::open(['route'=>'socio.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                    
                                    @csrf
                                        
                                    <div class="max-w-full items-center">
                                        @include('socio.partials.form')
                                    </div>
                                    
                                    {!! Form::hidden('user_id',auth()->user()->id) !!}

                                    {!! Form::hidden('evento_id', $evento->id ) !!}

                        

                                    @error('user_id')
                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                                    
                                    <div class="flex justify-center">
                                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                    </div>
                    
                                {!! Form::close() !!}
                          
                        @endif

                            
                </div>
            </section>
            
                          
                            
                            

           
                 

              
                 
              

            

                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if (IS_NULL($ticket)) text-blue-600 @else text-green-600 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
    
                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">2) Terminos y Condiciones</h2>
                            
                            </div>

                            
                        </div>
                        @if (!IS_NULL($ticket))
                                <div class="flex flex-col items-center mx-5 my-auto">
                                    <h2 class="text-xs font-medium text-gray-700 sm:text-xs dark:text-gray-200">Ha aceptado los terminos {{$evento->created_at->format('d-m-Y')}}</h2>
                                
                                </div>

                        @endif
                        
                     
                    </div>
                    @if (IS_NULL($ticket))
                            <p class="text-sm mt-4">A continuacion encontrara los terminos y condiciones que la organizacion a estipulado para el evento:</a></p>
                        

                                <div class="max-w-4xl mt-2 py-2 px-3  bg-gray-100">

                                    <scroll-container>
                                        <p class="text-sm my-2 mx-2 px-2">{!!$evento->terminos!!}</p>
                                    </scroll-container>
                    
                                
                                </div>

                                <hr>
                            {!! Form::open(['route' => 'organizador.tickets.store', 'method'=> 'POST']) !!}
                                @csrf

                                <p class="text-sm mt-4 text-center">  <input type="checkbox" name="seleccionable" value="TRUE"> Acepto los terminos y condiciones</p>
                            
                                @error('seleccionable')
                                    <p class="text-xs text-red-600 text-center font-bold">{{$message}}</p>
                                @enderror
                                {!! Form::hidden('user_id',auth()->user()->id) !!}

                                {!! Form::hidden('evento_id',$evento->id) !!}

                                {!! Form::hidden('pedidoable_type','App\Models\Socio') !!}
                                
                                @if (!IS_NULL($socio))
                                    {!! Form::hidden('pedidoable_id',$socio->id) !!}
                                @endif
                    
                                @if (!IS_NULL($socio))
                                    <div class="flex justify-center my-4">
                                    
                                        {!! Form::submit('Siguiente', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                @endif

                        {!! Form::close() !!}
                    @endif
                    
                </div>
             <section id="pago">   
                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>

                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">3) Inscripciones por Fecha</h2>
                            
                            </div>
                            
                        </div>

                    
                    
                    </div>
                    @if (!IS_NULL($ticket))
                        <div class="max-w-4xl px-10 py-2">
                        <div class="flex">
                            <p class="text-base leading-none my-auto mx-auto">En que categoria deseas competir?</p>
                                        
                            <select wire:model="selectedcategoria" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Categoria--</option>
                                @foreach ($fecha->categorias as $item)

                                    <option value="{{$item->id}}">{{$item->categoria->name}}-${{number_format($item->inscripcion)}}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                            @foreach ($evento->fechas as $fecha)
                                <div class="flex items-center justify-between pb-5 px-8 bg-blue-900 text-white py-2 my-4">
                                    <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                                                    
                            
                                    
                                    
                                    @if ($categoria_id)  
                                        <div class="block">
                                            <p class="text-base leading-none mx-auto text-center">Categoria:  </p>
                                            <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center">{{$fechacategoria->categoria->name}}</h1>
                                        </div>
                                    
                                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                        </div>
                                        <div class="block">
                                            <p class="ml-4">Número de Moto: </p>
                                        
                                            <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 ml-4 rounded-lg">
                                            <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                                <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                            </div>

                                        </div>

                                        <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                                            @csrf
                                            

                                            <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                                            <input name="fecha_categoria_id" type="hidden" value="{{$categoria_id}}">
                                            <input name="nro" type="hidden" value="{{$nro}}">
                                            <input name="fecha_id" type="hidden" value="{{$fecha->id}}">

                                            <button class="btn btn-primary" type="submit">Agregar</button>
                                        </form>   

                                        <p wire:click="add({{$fecha}})" class="hidden btn btn-primary">Agregar</p>



                                    @else
                                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                        </div>
                                        <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una categoria</p>
                                    @endif        
                                </div>
                            @endforeach

                                {{-- PREFICHA --}}

                                <x-table-responsive>

            

                            
                                        <table class="min-w-full divide-y divide-gray-200 mb-20 pb-20">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Categoria
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Número
                                            </th>
                                            
                                                <th  class="text-center mr-4 text-xs font-medium text-gray-500 uppercase tracking-wider justify-end ml-auto">
                                                    Precio
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                
                                                @foreach ($evento->fechas as $fecha)

                                                            
                                                            @foreach ($fecha->categorias as $const)

                                                                @foreach($const->inscripcions as $inscripcion)
                                                                
                                                                        <tr>
                                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                                <label class="mx-4"> {{$inscripcion->fecha->name}}</label>
                                                                            </td>
                                                                        
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                            
                                                                                    {{$inscripcion->fecha_categoria->categoria->name}}
                                                                                
                                                                                </td>
                                                                    
                                                                        
                                            
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                                    <div class="items-center">
                                                                                        <p class="mx-4 text-center">{{$inscripcion->nro}}</p>
                                                                                    </div>
                                                                                </td>
                                                                            
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                                    <div class="items-center">
                                                                                        
                                
                                                                                            <form action="{{route('ticket.inscripcions.destroy',$inscripcion)}}" method="POST">
                                                                                                @csrf
                                                                                                @method('delete')
                                                                                                <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                                                                                                <p class="mx-4 text-center" > ${{number_format($inscripcion->fecha_categoria->inscripcion)}} 
                                                                                                <button class="" ><i class="fas fa-trash cursor-pointer text-red-500 ml-6" type="submit" alt="Eliminar"></i> </button>
                                                                                                
                                                                                            </form>
                                                                                               </p>
                                                                                    </div>
                                                                                </td>
                                                                            
                                        
                            
                                                                        </tr>
                                                                @endforeach
                                                            @endforeach
                                                    

                                                @endforeach
                                            </tbody>
                                        </table>
                            
                            </x-table-responsive>

                        </div>


                    @endif

                
                    
                </div>
            </section>
           

            

            <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                <div class="flex justify-between">
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>

                        <div class="flex flex-col items-center mx-5 space-y-1">
                            <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">4) Pago</h2>
                        
                        </div>
                    </div>
                    
                 
                </div>
                @if ($total>0)
                <section>
                    <div class="max-w-4xl px-10 mt-6 py-2 bg-gray-100">
                        <div class="flex items-center justify-between px-8">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Inscripción</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white">${{number_format($total)}}</p>
                        </div>
                      

                        <div class="flex items-center justify-between pt-5 px-8">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Costos del Servicio</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white">${{number_format($total*0.072)}}</p>
                        </div>
                    
                    </div>
                <div>
                    <div class="flex items-center pb-6 justify-between lg:pt-5 pt-2 px-8">
                      <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                      <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">${{number_format($total*0.072+$total)}}</p>
                    </div>
                </div>

                <div class="cho-container flex justify-center mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>

                <div>
                    <p wire:click="enrolled" class="btn btn-primary">Agregar</p> 
                </div>
          
              


                    <hr>

                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
            </section>
                
                    
                @endif
            </div>
           

            <div class="flex justify-center mb-2">
                <a href="{{route('ticket.evento.show', $evento)}}">
                        <button class="bg-gray-800 px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Volver Atras
                        </button>
                </a>
                
            </div>

            
            <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>
        
        </div>
       
    </div>
    
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
