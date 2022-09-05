<div>
    
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
        $item->unit_price = 34300;

        

        $preference = new MercadoPago\Preference();
        //...
        $preference->back_urls = array(
            "success" => route('payment.evento', $evento),
            "failure" => route('checkout.evento', $evento),
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();

    @endphp


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
                            $min=32000;
                            $max=32000;
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
           
                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
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
                                <div style="line-height: 1.3rem;" class="mx-auto mt-6">
                                    <h1 style="font-size: 1.5rem;" class="text-center font-bold">{{$socio->name}} </h1>
                                    <h1 style="font-size: 1.125rem;" class="text-center font-bold" >{{$socio->rut}} </h1>
                                  
                                </div>
                            </div>

                        @else
                            
                                
                                    <div class="flex items-center pb-6 lg:pt-5 pt-2 px-8">
                                        <div class="w-full">

                                            <p class="text-2xl font-bold leading-normal text-center text-gray-800 dark:text-white">Iniciar Sesión</p>
                                        

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
                    
            
                          
                            
                            

           
                 

              
                 
              

            

            <div class="w-full bg-white flex items-center justify-between px-8 py-4 mx-auto border cursor-pointer rounded-xl dark:border-gray-700">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">2) Terminos y Condiciones</h2>
                       
                    </div>
                </div>
               
                <input type="checkbox"  value="" class="mr-4 mt-2">
            </div>

            <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                <div class="flex justify-between">
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>

                        <div class="flex flex-col items-center mx-5 space-y-1">
                            <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">3) Fechas</h2>
                        
                        </div>
                        
                    </div>
                    <select wire:model="selectedcategoria" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">--Categoria--</option>
                        @foreach ($fecha->categorias as $item)

                            <option value="{{$item->id}}">{{$item->categoria->name}}-${{number_format($item->inscripcion)}}</option>
                            
                        @endforeach
                    </select>
                   
                 
                </div>

                    <div class="max-w-4xl px-10 mt-6 py-2">
                        @foreach ($evento->fechas as $fecha)
                            <div class="flex items-center justify-between pb-5 px-8">
                                <p class="text-base leading-none text-gray-800 dark:text-white"> <input type="checkbox" value="{{$fecha->id}}" class="mr-4"> {{$fecha->name}}</p>
                                @php
                                    $ins=32000;
                                @endphp
                            @foreach ($fechas as $fecha)
                                @foreach($fecha->categorias as $categoria)
                                    @php
                                        if ($categoria->id==$categoria_id) {
                                            $ins=$categoria->inscripcion;
                                        }
                                    
                                    @endphp    
                                @endforeach
                            @endforeach
                           
                                
                                @if ($categoria_id)  
                                    <p class="text-base leading-none text-gray-800 dark:text-white">${{number_format($ins)}}</p>
                                @else
                                    <p class="text-base leading-none text-gray-800 dark:text-white">Ingrese una categoria</p>
                                @endif        
                            </div>
                        @endforeach
                    </div>
               

            
                
            </div>

           

            

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

                    <div class="max-w-4xl px-10 mt-6 py-2 bg-gray-100">
                        <div class="flex items-center justify-between px-8">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Inscripción</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white">$32.000</p>
                        </div>
                      

                        <div class="flex items-center justify-between pt-5 px-8">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Costos del Servicio</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white">$2.300</p>
                        </div>
                    
                  </div>
                  <div>
                    <div class="flex items-center pb-6 justify-between lg:pt-5 pt-2 px-8">
                      <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                      <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">$34.300</p>
                    </div>
                 </div>

                <div class="cho-container flex justify-center mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>
          
              


                    <hr>

                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
           
                
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
