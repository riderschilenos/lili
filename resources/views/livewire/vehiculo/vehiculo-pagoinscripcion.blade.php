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
    $item->title = 'Inscripcion:';
    $item->quantity = 1;
    $item->unit_price = 10000;

    

    $preference = new MercadoPago\Preference();
    //...
    
    $preference->back_urls = array(
        "success" => "",
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();

    @endphp

    @if ($vehiculo->status==2)
        <h1 class="text-lg ml-2 font-bold text-center">La inscripción del primer vehiculo es un gentil auspicio de RIDERS CHILENOS.</h1>


        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="flex justify-center mt-6">
                
                <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
            </div>
                
        <div class="card"><div class="card-body">
            <article class="flex items-center">
                @if (auth()->user()->socio->vehiculos->count()==1)

                
                   
                        <h1 class="text-lg ml-2 font-bold">Periodo de inscripcion:</h1>
                        <h1 class="text-lg ml-2"> 1 año</h1>
                        
                        

           
                        <p class="text-xl font-bold ml-auto">GRATIS</p>
            
                        
                
                    
                @else


                        <h1 class="text-lg ml-2 font-bold">Periodo de inscripcion:</h1>
                        <h1 class="text-lg ml-2"> 1 año</h1>
                        
                        

           
                        <p class="text-xl font-bold ml-auto">$10.000</p>
                    </article>

                    <div class="cho-container flex justify-center mt-2 mb-4">
                        <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                    </div>
                    
                @endif
                    
                    
                
            
            
            
            
        </div></div></div>

        </div>

        @if (auth()->user()->socio->vehiculos->count()==1)
                
            <div class="flex justify-center mt-2 mb-4">

                <form action="{{route('garage.inscribir',$vehiculo)}}" method="POST">
                    @csrf

                    <button class="btn btn-primary" type="submit">Inscribir</button>
                </form>   

            </div>
                    
        @endif

        

    @elseif($vehiculo->status==6||$vehiculo->status==6)

        Como mantener o eliminar la siscripcion

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
