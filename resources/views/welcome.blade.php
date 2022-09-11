<x-app-layout>

    <div id="default-carousel" class="hidden sm:block mx-auto relative max-w-7xl md:mt-16" data-carousel="static" style='z-index: 1 ; '>
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <span class="hidden absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                <img src="{{asset('img/homeslider/carcasas-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('img/homeslider/polerones-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('img/homeslider/poleras-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
             <!-- Item 4 -->
             <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('img/homeslider/tienda-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 mb-4 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <figure class="block sm:hidden pt-0 pb-4">

       
        
            {{-- comment <img class="h-80 w-full object-cover object-center" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">--}}
            <ul class="slider snap-mandatory flex overflow-x-auto gap-0 snap-x before:shrink-0 before:w-[30vw] after:shrink-0 after:w-[30vw]" style='z-index: 1 ; '>
                
                <li class="shrink-0 snap-center w-full snap-mandatory">       
                    <img class="" src="{{asset('img/mobileslider/polerones-min.png')}}" alt="" style="scroll-snap-align: center;">
                </li>
                <li class="shrink-0 snap-center w-full snap-mandatory">       
                    <img class="" src="{{asset('img/mobileslider/carcasas-min.png')}}" alt="" style="scroll-snap-align: center;">
                </li>
                <li class="shrink-0 snap-center w-full snap-mandatory">       
                    <img class="" src="{{asset('img/mobileslider/poleras-min.png')}}" alt="" style="scroll-snap-align: center;">
                </li>        
                <li class="shrink-0 snap-center w-full snap-mandatory">       
                    <img class="" src="{{asset('img/mobileslider/tienda-min.png')}}" alt="" style="scroll-snap-align: center;">
                </li>
              
            </ul>
           

      
    </figure>
    
 
    
    <section class="bg-cover bg-center hidden sm:hidden" style="background-image: url({{asset('img/home/homefotomini.png')}})">

        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 pt-64 pb-8">
            
                <h1 class="text-white font-fold text-4xl text-center">RidersChilenos</h1>
                <p class="text-white text-lg mt-2 mb-4 text-center">Bienvenido al Portal Rider Más Grande del País </p>
                    <!-- component -->
                    <!-- This is an example component -->
            
                
            
        </div>

    </section>
   

    <section class="mt-12 sm:mt-16">
        

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/RIDERS-min.png')}}" alt=""></a>
                </figure>

            
            </article>
            <article>
                <figure>
                    <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO2-min.png')}}" alt=""></a>
                </figure>
            
            </article>
            <article>
                <figure>
                    <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS2-min.png')}}" alt=""></a>
                </figure>
            
            </article>
            <article>
                <figure>
                    <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/VIDEO-min.png')}}" alt=""></a>
                </figure>
                
            </article>
        
        </div>

    </section>
    
    <section class="mt-16 bg-rider-color py-12">
        <h1 class="text-center text-white text-3xl mt-4">Últimos Riders Registrados</h1>
        <p class="text-center text-white pb-6">Unete a la comunidad rider más grande del país</p>
        

        <div class="max-w-7xl mx-auto px-4 pt-10 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($riders as $rider)

                <x-socio-card :socio="$rider" />
                
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
        <h1 class="text-center text-3xl text-gray-600 font-bold">Compra y Venta Rider</h1>
        <p class="text-center text-gray-500 text-sm mb-6 pb-10">Bicicletas, Motos y Otros.</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">

            @foreach ($autos as $auto)

                <x-vehiculo-card :vehiculo="$auto" />
                
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

    <section class="mt-4 bg-rider-color pt-12 pb-50">
        <h1 class="text-center text-3xl text-white pt-16">Ultimos Videos y Carreras</h1>
        <p class="text-center text-white text-sm pb-16">Compra y apoya las producciones nacionales</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($series as $peli)

                <x-serie-card :serie="$peli" />
                
            @endforeach

        </div>
        <h1 class="text-center text-xs text-white py-12">Todos Los derechos Reservados</h1>
    </section>

</x-app-layout > 

