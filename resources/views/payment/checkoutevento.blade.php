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
        $item->title = 'evento:';
        $item->quantity = 1;
        $item->unit_price = $evento->entrada;

        

        $preference = new MercadoPago\Preference();
        //...
        $preference->back_urls = array(
            "success" => route('payment.evento', $evento),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();

    @endphp


    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold mb-2">Proceso de Inscripción</h1>

        <div class="mx-2 card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($evento->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$evento->titulo}}</h1>
                    <div class="ml-auto justify-end">
                        <p class="text-xl font-bold ml-auto">Inscripción Adultos ${{number_format($evento->entrada)}}</p>
                        <p class="text-xl font-bold ml-auto">Inscripción Niños ${{number_format($evento->entrada_niño)}}</p>
                    </div>
                </article>
               
                <hr>

                <p class="text-sm mt-4">{!!$evento->descripcion!!}</p>
            </div>
        </div>

        <div class="mx-2 mt-6 grid grid-cols-1 gap-y-4 xl:mt-12">
            <div class="w-full bg-white flex items-center justify-between px-8 py-4 mx-auto border cursor-pointer rounded-xl dark:border-gray-700">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="px-2 text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">1) Datos del Competidor</h2>
                        
                    </div>


                    
                </div>
                
                <h2 class="text-2xl font-semibold text-gray-500 sm:text-4xl dark:text-gray-300"><span class="text-base font-medium">Editar</span></h2>
            </div>

            <div class="w-full bg-white flex items-center justify-between px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">2) Fechas</h2>
                     
                    </div>
                </div>
                
                <h2 class="text-2xl font-semibold text-blue-600 sm:text-4xl">$32.000 <span class="text-base font-medium">/CLP</span></h2>
            </div>

           

            <div class="w-full bg-white flex items-center justify-between px-8 py-4 mx-auto border cursor-pointer rounded-xl dark:border-gray-700">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">3) Terminos y Condiciones</h2>
                       
                    </div>
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
                    
                    <h2 class="text-2xl font-semibold text-blue-600 sm:text-4xl">$32.000 <span class="text-base font-medium">/CLP</span></h2>
                </div>

                <div class="cho-container flex justify-center mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>


                    <hr>

                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
           
                
            </div>
           

            <div class="flex justify-center mb-10">
                <a href="{{route('ticket.evento.show', $evento)}}">
                        <button class="bg-gray-800 px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Volver Atras
                        </button>
                </a>
                
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