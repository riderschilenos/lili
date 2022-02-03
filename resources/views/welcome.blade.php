<x-app-layout>

    <section class="bg-cover bg-center" style="background-image: url({{asset('img/home/homefotomini.png')}})">

        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 pt-64 pb-8">
            
                <h1 class="text-white font-fold text-4xl text-center">RidersChilenos</h1>
                <p class="text-white text-lg mt-2 mb-4 text-center">Bienvenido al Portal Rider Más Grande del País</p>
                    <!-- component -->
                    <!-- This is an example component -->
             
                
            
        </div>

    </section>

    <section class="my-4  py-12">
        <h1 class="text-center text-3xl text-gray-600 font-bold">Compra y Venta Rider</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Bicicletas, Motos y Otros.</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">

            @foreach ($vehiculos as $vehiculo)

                <x-vehiculo-card :vehiculo="$vehiculo" />
                
            @endforeach

        </div>

        <div class="flex justify-center mt-4 pt-4">
            <div class="grid grid-cols-2 gap-2">
            <a href="{{route('garage.vehiculo.vender')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                Publicar
            </a>
            <a href="{{route('garage.usados')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                Ver todos
            </a>

            </div>
    
    </section>

    <section class="mt-16">
        

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home4.jpeg')}}" alt=""></a>
                </figure>

              
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home2.jpeg')}}" alt="">
                </figure>
              
            </article>
            <article>
                <figure>
                    <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home1.jpeg')}}" alt=""></a>
                </figure>
               
            </article>
            <article>
                <figure>
                    <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home3.jpeg')}}" alt=""></a>
                </figure>
                
            </article>
        
        </div>

    </section>
    <section class="mt-16 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Ultimos Riders Registrados</h1>
        <p class="text-center text-white pb-6">Unete a la comunidad rider más grande del país</p>
        

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($socios as $socio)

                <x-socio-card :socio="$socio" />
                
            @endforeach

        </div>

        <div class="flex justify-center mt-4 pt-4">
            <a href="{{route('socio.create')}}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">
                Obtener Suscripción
            </a>
        </div>
        <div class="flex justify-center mt-2 pt-2">
            <a href="{{route('socio.index')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                Ver Todos
            </a>
        </div>
    
    </section>

    <section class="my-4  py-12">
        <h1 class="text-center text-3xl text-gray-600">Ultimos Videos y Carreras</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Compra y apoya las producciones nacionales</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($series as $serie)

                <x-serie-card :serie="$serie" />
                
            @endforeach

        </div>
    
    </section>

</x-app-layout>

