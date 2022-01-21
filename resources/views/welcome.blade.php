<x-app-layout>

    <section class="bg-cover" style="background-image: url({{asset('img/home/homefotomini.png')}})">

        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-white font-fold text-4xl">RidesChilenos</h1>
            <p class="text-white text-lg mt-2 mb-4">Bienvenido al portar rider mas grande del país</p>
                <!-- component -->
                <!-- This is an example component -->
                
                @livewire('search')
                
            </div>
        </div>

    </section>

    <section class="mt-16">
        <h1 class="text-gray-600 text-center text-3xl mb-12"> Contenido </h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home4.jpeg')}}" alt="">
                </figure>

              
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home2.jpeg')}}" alt="">
                </figure>
              
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home1.jpeg')}}" alt="">
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
        <h1 class="text-center text-white text-3xl">Ultimas Producciones AudioVisuales</h1>
        <p class="text-center text-white">Dirigete al catalogo y filtra por disciplina y artista</p>
        
        <div class="flex justify-center mt-4">
            <a href="{{route('series.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                Catalogo de Videos
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

