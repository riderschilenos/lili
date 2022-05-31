<x-app-layout>
    @php
    // SDK de Mercado Pago
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Suscripción Vendedor Rider Chilenos:';
    $item->quantity = 1;
    $item->unit_price = 14990;

    

    $preference = new MercadoPago\Preference();
    //...
    if (auth()->user()){
        if (auth()->user()->vendedor){

            $preference->back_urls = array(
            "success" => route('payment.vendedor', auth()->user()->vendedor),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending");
        }
        else{
            $preference->back_urls = array(
            "success" => "http://www.tu-sitio/success",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
            );
        }
    }else{
        $preference->back_urls = array(
            "success" => "http://www.tu-sitio/success",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
            );
    }

    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();
        
    @endphp


    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="card pb-8 ">
           
                

                <div class="justify-between gap-4 bg-red-700">
               
                        <h1 class="text-3xl font-bold py-4 text-center text-white">Haz Parte del Equipo Riders Chilenos</h1>
                        
                    
                   
                </div>

                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                    <article>
                        <figure>
                            <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend1.png')}}" alt=""></a>
                        </figure>
            
                      
                    </article>
                    <article>
                        <figure>
                            <a href="" wire:click="download('catalogoportanumeros.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend2.png')}}" alt=""></a>
                        </figure>
                      
                    </article>
                    <article>
                        <figure>
                            <a href="" wire:click="download('polerasmx.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                        </figure>
                       
                    </article>
                </div>

                <div class="justify-between bg-gray-900 mt-8 px-4 lg:px-12">

                        <h1 class="text-2xl py-4 text-center text-white">Hazte Promotor de Nuestros Productos y Gana Dinero Haciendo lo Que Amas!! Solo debes obtener la membresia y podras recibir comisión en efectivo por cada producto que vendas.</h1>
                
                </div>

                <h1 class="text-3xl font-bold text-center my-8">Nuestros productos</h1>

                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                        </figure>
            
                      
                    </article>
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                        </figure>
                      
                    </article>
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                        </figure>
                       
                    </article>
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                        </figure>
                       
                    </article>
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                        </figure>
                       
                    </article>
                    <article>
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                        </figure>
                       
                    </article>
                    <div class="hidden md:block">

                    </div>
                    <article class="hidden md:block">
                        <figure>
                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                        </figure>
                       
                    </article>
                </div>

                <div class="block  md:hidden">
                    <article class="flex justify-center mt-2">
                        <figure>
                            <img class="w-44 object-contain" src="{{asset('img/vendedores/7.png')}}" alt="">
                        </figure>
                    </article>
                </div>
             
                <div class="justify-between mt-8 bg-gray-200">

                    <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                    <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe.png')}}" alt="">
                            </figure>
                           
                        </article>
                        <div>
                            <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                            <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                
                        </div>


                    </div>
            
                </div>
            
                

                    <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>

                    <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                            </figure>
                
                          
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                            </figure>
                          
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                            </figure>
                           
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                            </figure>
                           
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                            </figure>
                           
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                            </figure>
                           
                        </article>
                        <div class="hidden md:block">
    
                        </div>
                        <article class="hidden md:block">
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                            </figure>
                           
                        </article>
                    </div>
                
                <div class="card-body">
                        @if (auth()->user())
                        
                     
                            @if (auth()->user()->vendedor)

                                
                                <h1 class="text-center">Para activar tu registro como vendedor debes aceptar los terminos y condiciones y hacer el pago correspondiente</h1>

                                <h1 class="text-center">{{auth()->user()->name}}</h1>
                                
                                <div class="cho-container flex justify-center mt-2 mb-4">
                                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                </div>

                                
                            @else

                            <div>
                                @php
                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                @endphp
                                {!! Form::open(['route'=>'vendedor.home.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                            
                                @csrf
                                    
                                <div class="max-w-full items-center">


                                    <h1 class="text-xl pb-4 text-center">Formulario de Promotor RCH</h1>

                                    <p class="text-center">Indique los datos del titular de la cuenta</p>

                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                        <div class="md: col-span-2 lg:col-span-2 ">
                                            <div class="mb-4">
                                                {!! Form::label('name', 'Nombre completo:') !!}
                                                {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
                
                                                @error('name')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('rut', 'Rut:') !!}
                                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                
                                                @error('rut')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('fono', 'Fono:') !!}
                                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('localidad', 'Localidad:') !!}
                                                {!! Form::text('localidad', null , ['class' => 'form-input block w-full mt-1'.($errors->has('localidad')?' border-red-600':'')]) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('disciplina_id', 'Disciplina favorita:') !!}
                                                {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            
                                         
                                        </div>
                                    
                                    </div>
                                

                                    <h1 class="text-xl pb-4 text-center">Datos Bancarios</h1>

                                    <p class="text-center">Indique en que cuenta desea recibir sus comisiones por productos vendidos</p>

                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                        <div class="md: col-span-2 lg:col-span-2 ">
                                            
                                            <div class="mb-4">
                                                {!! Form::label('banco', 'Banco:') !!}
                                                {!! Form::select('banco', $bancos, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('tipo_cuenta', 'Tipo de cuenta:') !!}
                                                {!! Form::select('tipo_cuenta', $cuentas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            
                                            <div class="mb-4">
                                                {!! Form::label('nro_cuenta', 'Nro Cuenta*') !!}
                                                {!! Form::text('nro_cuenta', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_cuenta')?' border-red-600':'')]) !!}
                
                                                @error('nro_cuenta')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                            
                                        </div>
                                    
                                    </div>
                                
                                    
                                </div>
                                {!! Form::hidden('user_id',auth()->user()->id) !!}
                            
                                    <div class="flex justify-center">
                                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                    </div>
                                
                                {!! Form::close() !!}
                            </div>
                                
                            @endif

                
                        @else
                            
                        <h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
                        @php
                        $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                        $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                    @endphp
                    {!! Form::open(['route'=>'vendedor.home.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                
                    @csrf
                        
                    <div class="max-w-full items-center">


                        <h1 class="text-xl pb-4 text-center">Formulario de Promotor RCH</h1>

                        <p class="text-center">Indique los datos del titular de la cuenta</p>

                        <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                            <div class="md: col-span-2 lg:col-span-2 ">
                                <div class="mb-4">
                                    {!! Form::label('name', 'Nombre completo:') !!}
                                    {!! Form::text('name', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
    
                                    @error('name')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    {!! Form::label('rut', 'Rut:') !!}
                                    {!! Form::text('rut', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
    
                                    @error('rut')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                                </div>
                                
                             
                            </div>
                        
                        </div>
                    
                    
                        
                    </div>
                    {!! Form::close() !!}
                    <h1 class="text-center py-2 font-bold">Para desbloquear el formulario debes ingresar a tu cuenta RCH</h1>
                    <div class="flex justify-center">
                        
                        <a href="{{ route('login') }}" class="btn btn-primary mb-4">Iniciar Sesión</a>
                        
                    </div>
                        @endif  
                
                
            </div>
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

</x-app-layout>