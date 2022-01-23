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
    $item->title = 'Suscripción:';
    $item->quantity = 1;
    $item->unit_price = 25000;

    

    $preference = new MercadoPago\Preference();
    //...
    if($socio){
    $preference->back_urls = array(
        "success" => route('payment.socio', $socio),
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();
}
    @endphp
    
        @if ($socio)

        <div class="mx-auto px-4 sm:px-2 lg:px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-2 gap-y-8">
            <div class="md: col-span-1 lg:col-span-2">

                <div class="flex justify-center mt-4">
                    <div class="max-w-sm ">

                        <x-socio-card :socio="$socio" />

                    </div>
                </div>
            </div>

            <div class="md: col-span-2 lg:col-span-3">
                @if (!is_null($socio->direccion))
                    <div>
                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg flex">
                            <h1 class="font-bold text-lg text-gray-800">Dirección</h1>
                            <i class="fas fa-trash cursor-pointer text-red-500 ml-auto align-middle" wire:click="destroydireccion({{$socio->direccion}})" alt="Eliminar"></i>
                        </header>
                        <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-0 shadow-lg rounded-b-lg">
                            

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
                    <div class="mt-6">

                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg">
                            <h1 class="font-bold text-lg text-gray-800 text-center">PAGO</h1>
                        </header>
                        <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 mt-0 shadow-lg rounded-b-lg">
                            

                            <article class="flex items-center grid-cols-6">

                                

                                <div>
                                    <div class="flex">
                                        
                                        <h1 class="text-lg ml-4">1 Año Suscripcion <i class="fas fa-calendar-check text-white-800"></i></h1>
                                    </div>
                                    <p class="pt-2 ml-3">Fecha de Vencimiento: {{date('d-m-Y', strtotime($now))}}</p>
                                </div>
                            <p class="text-xl font-bold ml-auto">$25.000</p>
                            </article>
                            <div class="cho-container flex justify-center mt-2 mb-4">
                                <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                            </div>
            
                            <hr>
            
                            <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
                        
                        </div>
                    
                    </div>
                    
                    
                    
                @else

                    <div name="formulariodireccioninvitados">
                        <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una direccion de despacho para recibir tu credencial Física</h1>

                        
                        {!! Form::open(['route' => 'vendedor.direccions.store']) !!}

                        {!! Form::hidden('pedido_id', 'suscripcion' ) !!}
                
                        {!! Form::hidden('direccionable_id', $socio->id ) !!}

                        {!! Form::hidden('direccionable_type','App\Models\Socio') !!}
                        
                        @include('vendedor.pedidos.partials.formdirection')
                
                
                        <div class="flex justify-end">
                            <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                            {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                        </div>
                
                        {!! Form::close() !!}
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
                @error('user_id')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
                   
                <div class="flex justify-center">
                    {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>

            {!! Form::close() !!}
        @endif
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
