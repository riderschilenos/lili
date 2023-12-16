<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @php
                // SDK de Mercado Pago
                require base_path('/vendor/autoload.php');
                // Agrega credenciales
                MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
            
                // Crea un objeto de preferencia
                $preference = new MercadoPago\Preference();

                // Crea un ítem en la preferencia
                $item = new MercadoPago\Item();
                $item->title = 'Suscripción:';
                $item->quantity = 1;
                $item->unit_price = 11990;

                //...
                if($socio){
                $preference->back_urls = array(
                    "success" => route('payment.socio', $socio),
                    "failure" => route('socio.create'),
                    "pending" => route('socio.create')
                );
                $preference->auto_return = "approved";

                $preference->items = array($item);
                $preference->save();
                    }
                @endphp
    
        @if ($socio)
        

        <div class="mx-auto sm:px-2 lg:px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-2">
            <div class="md: col-span-1 lg:col-span-3">
                
                <div class="bg-white font-sans flex items-center justify-center">
                    <div class="">
                        <div class="max-w-lg lg:max-w-xl mx-auto">
                            <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                                    
                                <div class="flex">
                                    <div class="content-center items-center">
                                        <div class="image overflow-hidden" x-on:click="fullview=true">
                                            @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                                                <img class="h-36 mx-auto object-cover"
                                                src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg"
                                                alt="Rider Chileno">
                                            @else
                                                <img class="h-36   object-cover"
                                                src="{{ $socio->user->profile_photo_url }}"
                                                alt="{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}">

                                            @endif
                                        
                                        </div>
                                        

                                    </div>
                                    <div class="col-spam-3 px-4 w-full">
                                        <a href="{{route('socio.show', $socio)}}">
                                            <h1 class="text-blue-400 font-bold text-lg leading-8 mb-1">{{ '@'.$socio->slug }}</h1>
                                        </a>  
                                        <div class="flex content-center">
                                            <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                <i class="fas fa-birthday-cake content-arount" aria-hidden="true"></i>
                                            </div>
                                            <div class="px-2 py-2 text-sm">{{date('d-m-Y', strtotime($socio->born_date))}}</div>
                                        </div>
                                    
                                        <div class="flex items-center content-center">
                                                    @if($socio->direccion)
                                                        <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                        <i class="fa fa-map-marker my-auto py-auto" aria-hidden="true"></i>
                                                    </div>
                                                    
                                                        <div class="px-2 py-2">{{Str::limit($socio->direccion->comuna.', '.$socio->direccion->region,20)}}</div>
                                                    @endif
                                        </div>

                                       
                                            <div class="flex justify-center">
                                                {!! Form::open(['route'=>['update.foto',$socio->user],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                @csrf
                                                <article class="flex justify-center grid-cols-2 gap-4">
            
                                                   
                                                   
                                                    
                                                    @if($socio->user->profile_photo_path )
                                                       
                                                            <div class="flex justify-center">
                                                                {!! Form::submit('Actualizar', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer mt-4']) !!}
                                                            </div>
                                                       
                    
                                                    @else
                                                        <div class="flex justify-center">
                                                            {!! Form::submit('Enviar', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer mt-4']) !!}
                                                        </div>
                                                    @endif   
                                                
                                        
                                        
                                                </article>
                                                
                                            </div>                                            
                                       

                                            @if($socio->user->vendedor) 
                                                @if($socio->user->vendedor->estado==2) 
                                                    @if($socio->fono) 
                                                        <div >
                                                            <a href="{{route('socio.store.show', $socio)}}">
                                                                <button class="hidden bg-red-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-red-500 focus:outline-none focus:shadow-outline focus:bg-red-500 hover:shadow-xs p-3 my-4">TIENDA ONLINE</button>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif
                                    

                                        
                                    </div>
                                </div>
                                <div>
                                    <div class="grid grid-cols-1 gap-4 mt-2">
                                        
                                            <div>
                                                {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                                                @error('foto')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                       
                                    </div>
                                </div>                
                                {!! Form::close() !!}
                                <div class="">
                                  
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="md: col-span-2 lg:col-span-3">
                @if (!is_null($socio->direccion))
                    <div>
                        <div class="bg-white font-sans flex items-center justify-center">
                            <div class="">
                                <div class="max-w-lg lg:max-w-xl mx-auto">
                                    <div class="transition-all duration-300 bg-white rounded-lg shadow-md border-l-4 border-blue-600">
                                                    
                                        
                                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg flex">
                                            <h1 class="font-bold text-lg text-gray-800">Dirección</h1>
                                            <i class="fas fa-trash cursor-pointer text-red-500 ml-auto align-middle" wire:click="destroydireccion({{$socio->direccion}})" alt="Eliminar"></i>
                                        </header>
                                        <div class="p-2">
                                          
                                          
                                            <div class="full-w sm:px-2 lg:px-6 py-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-0 rounded-b-lg">
                                                

                                                <div>
                                                    <p class="font-bold mr-2s">Comuna: </p>{{$socio->direccion->comuna}}
                                                </div>
                                                <div>
                                                    <p class="font-bold mr-2s">Calle: </p>{{$socio->direccion->calle}}
                                                </div>
                                                <div>
                                                    <p class="font-bold mr-2s">Nro: </p>{{$socio->direccion->numero}}
                                                </div>
                                                <div>
                                                    <p class="font-bold mr-2">{{$socio->direccion->region}}</p>
                                                </div>

                                                <div>

                                                </div>    
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>

                  
                    
                @else
                    
                    <div x-data="{direccion: true}">
                        <div class="bg-white font-sans flex items-center justify-center">
                            <div class="">
                                <div class="max-w-lg lg:max-w-xl mx-auto">
                                    <div class="transition-all duration-300 bg-white rounded-lg shadow-md border-l-4 border-blue-600">
                                                    
                                        <header class="border border-gray-200 px-4 cursor bg-gray-200 mt-6 rounded-t-lg flex justify-between">
                                            <h1 class="font-bold text-lg text-gray-800 mt-2">Dirección</h1>
                                            <button  class="font-semibold text-blue-500 py-2 px-4 justify-center cursor-pointer ml-auto" x-on:click="direccion=!direccion">omitir</button>
                                                
                                        </header>
                                        <div class="p-2">
                                            <h1 class="text-base text-gray-700 text-center my-6 mx-4"> Debes ingresar una dirección de despacho para recibir tu credencial Física</h1>
                        
                                            <div name="formulariodireccioninvitados" x-show="direccion" class="mx-4">
                                            
                                                
                                                {!! Form::open(['route' => 'vendedor.direccions.store']) !!}
                        
                                                {!! Form::hidden('pedido_id', 'suscripcion' ) !!}
                                        
                                                {!! Form::hidden('direccionable_id', $socio->id ) !!}
                        
                                                {!! Form::hidden('direccionable_type','App\Models\Socio') !!}
                                                
                                                @include('vendedor.pedidos.partials.formdirection')
                                        
                                        
                                                <div class="flex justify-between">
                                                    <button x-on:click="direccion=false" class="font-semibold rounded-lg hover:bg-gray-100 text-blue-500 py-2 px-4 justify-center cursor-pointer ml-2">omitir</button>
                                                    {!! Form::submit('Agregar Dirección', ['class'=>'font-semibold rounded-lg bg-green-600 hover:bg-green-500 text-white py-2 px-4 justify-center cursor-pointer ml-2']) !!}
                                                </div>
                                        
                                                {!! Form::close() !!}
                                            </div>  
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>

                @endif

                @if($socio->suscripcions->count())

                    @foreach ($socio->suscripcions as $suscripcion)
                        
                        
                        <div class="mt-6">

                            <header class="border border-green-200 px-4 pt-2 cursor bg-green-500     mt-6 rounded-t-lg">
                                <h1 class="font-bold text-lg text-white text-center">SUSCRIPCIÓN ACTIVA</h1>
                            </header>
                            <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 mt-0 shadow-lg rounded-b-lg">
                                

                                <article class="flex items-center grid-cols-6">

                                            <p class="pt-2 ml-3 font-bold">Activacion: </p> 
                                            
                                            <p class="pt-2 ml-auto items-center">{{$suscripcion->created_at->format('d-m-Y')}} </p>

                                    
                                        
                                            <p class="pt-2 ml-3 font-bold">Fecha de Vencimiento: </p> 
                                            
                                            <p class="pt-2 ml-auto items-center">{{date('d-m-Y', strtotime($suscripcion->end_date))}} </p>
                                        
                                        
                                
                                
                                </article>
                                {!! Form::open(['route'=>['socio.fotos',$socio],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                    @csrf
                                    <h1 class="text-xl font-bold text-center">Solicita tu Credencial de Socio (Gratis)</h1>
                                    <article class="flex justify-center grid-cols-2 gap-4">

                                        <div>
                                            <h1 class="text-md text-center">Foto Rostro del Rider</h1>
                                            <div class="grid grid-cols-1 gap-4">
                                                <figure class="flex justify-center">
                                                    @if($socio->foto)
                                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="{{Storage::url($socio->foto)}}" alt="">
                                                        @else
                                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="https://st4.depositphotos.com/5575514/23597/v/600/depositphotos_235978748-stock-illustration-neutral-profile-picture.jpg" alt="">
                                                        
                                                    
                                                    @endif
                                                </figure>
                                                @if(is_null($socio->foto) || is_null($socio->carnet) )
                                                    <div>
                                                        {!! Form::file('foto', ['class'=>'form-input w-full'.($errors->has('foto')?' border-red-600':''), 'id'=>'foto','accept'=>'image/*']) !!}
                                                        @error('foto')
                                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <h1 class="text-md text-center">Foto Frontal del Carnet</h1>
                                            <div class="grid grid-cols-1 gap-4">
                                                <figure class="flex justify-center">
                                                    @isset($socio->carnet)
                                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="{{Storage::url($socio->carnet)}}" alt="">
                                                        @else
                                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="https://nyc3.digitaloceanspaces.com/archivos/elmauleinforma/wp-content/uploads/2021/02/01141319/Cedula-de-identidad-2.jpg" alt="">
                                                        
                                                    
                                                    @endisset
                                                </figure>
                                                @if(is_null($socio->foto) || is_null($socio->carnet))
                                                    <div>
                                                        {!! Form::file('carnet', ['class'=>'form-input w-full'.($errors->has('carnet')?' border-red-600':''), 'id'=>'carnet','accept'=>'image/*']) !!}
                                                        @error('carnet')
                                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        
                                    
                            
                            
                                    </article>
                                        @if($socio->carnet || $socio->foto )
                                            @if(is_null($socio->carnet) || is_null($socio->foto))
                                                <div class="flex justify-center">
                                                    {!! Form::submit('Actualizar', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer mt-4']) !!}
                                                </div>
                                            @endif

                                        @else
                                            <div class="flex justify-center">
                                                {!! Form::submit('Enviar', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer mt-4']) !!}
                                            </div>
                                        @endif                                
                                 {!! Form::close() !!}
                
                            </div>
                        
                        </div>

                    @endforeach 
                    
                @else
                    
                
                    <div class="mt-6">

                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg">
                            <h1 class="font-bold text-lg text-gray-800 text-center">PAGO</h1>
                        </header>
                        <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 mt-0 shadow-lg rounded-b-lg">
                            
                            <div class="flex justify-center sm:hidden">
                                <h1 class="text-center">CREDENCIAL FÍSICA + GORRO REGALO</h1>
                                <h1 class="hidden text-lg ml-4">+ Activación Perfil<i class="fas fa-calendar-check text-white-800"></i></h1>
                            </div>
                            <article class="flex items-center grid-cols-6">

                                <img class="h-24 w-24 object-cover mr-2" src="{{asset('img/socio/promo.jpeg')}}" alt="">

                                <div>
                                
                                    <div class="hidden sm:flex">
                                        <h1 class="text-center">CREDENCIAL FÍSICA + GORRO REGALO</h1>
                                        <h1 class="hidden text-lg ml-4">+ Activación Perfil<i class="fas fa-calendar-check text-white-800"></i></h1>
                                    </div>
                                
                                </div>
                            <p class="text-xl font-bold ml-auto">$11.990</p>
                            </article>
                            
                            <div class="max-w-4xl bg-white rounded-xl shadow-md pt-6 pb-4 px-2 sm:px-8 ">
                                <div class="max-w-4xl flex justify-between items-center">
                                
                                    <div class="items-center">
                                        <img class="h-full w-40  object-contain" src="{{asset('img/mercadopago.png')}}" alt="">
                                    
                                    </div>
                                    <div class="hidden sm:flex items-center">
                                    
                                        <p class="text-lg my-auto text-center">Paga Utilizando tarjeta de Crédito o Débito</p>
                                    </div>
                                
                                    <div class="cho-container mt-2 mb-4">
                                        <!-- Esto es <a href="" class="font-bold py-2 px-4 rounded bg-blue-500 text-white">Pagar</a> un comentario -->
                                    </div>
                                </div>
                        
                            
                                <div class="flex justify-center sm:hidden items-center">
                                
                                    <p class="text-base my-auto text-center">Paga Utilizando tarjeta de Crédito o Débito</p>
                                </div>
                            
                            </div>
            
                            <hr>
            
                            <p class="text-sm mt-4">El pago de la suscripción anual activara tu perfil y te permitira hacer uso de las distintas secciones de el, donde se destaca la posibilidad de poder INSCRIBIR tu vehiculo rider y llevar registro de mantenciones y sercicios relacionados, la asignacion es automatica y una vez sea activado tu perfil nosotros realizaremos tu credencial de socio, la cual lleva un codigo QR que enlaza con el perfil que puedes ver a un costado de esta página. <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
                        
                        </div>
                    
                    </div>
                
                @endif
            </div>
        
        @else
            {!! Form::open(['route'=>'socio.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                
                @csrf
                    
                <div class="max-w-full items-center">
                    @include('socio.partials.form')
                </div>
                {!! Form::hidden('user_id',auth()->user()->id) !!}

                {!! Form::hidden('evento_id', 'suscripcion' ) !!}
                
                @error('user_id')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
                   
                <div class="flex justify-center">
                    {!! Form::submit('Siguiente paso', ['class'=>'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer']) !!}
                </div>

            {!! Form::close() !!}
        @endif
    
        
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script src="{{asset('js/socio/form.js')}}"></script>
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
        <script>
          
          Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            headers:{
              'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
            },
            acceptedFiles: "image/*",
            maxFiles: 6,
            
    
              
              };
             
              
          
        </script>
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
