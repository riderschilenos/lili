<x-app-layout>
    <x-slot name="tl">
            
        <title>Videos RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <div class="words sm:hidden bg-white pt-2 overflow-x-auto whitespace-no-wrap border-b-2 font-bold text-gray-700">
            <div class="flex justify-center">
                <div class="px-4 py-2 cursor-pointer hover:underline text-gray-900" @click="user = false; home = false; socio = true; evento = false; registro = false; vendedor = false; base = false" >Riders</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="evento = true; user = false; home = false; socio = false; registro = false; vendedor = false; base = false" >Eventos</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="user = false; home = false; socio = false; evento = false; registro = true; vendedor = false; base = false" >Bikes</div>
                <div class="px-4 py-2 cursor-pointer underline text-gray-900" @click="user = false; home = false; video = true; socio = false; evento = false; registro = false; vendedor = false; base = false" >Videos</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="user = false; novedades = true; home = false; socio = false; evento = false; registro = false; vendedor = false; base = false" >Novedades</div>
            
            <!-- Agrega más categorías aquí -->
            </div>
        </div>

        <section class="hidden sm:block bg-cover bg-center" style="background-image: url({{asset('img/home/video.jpg')}})">

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 py-16">
                <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">RidesChilenos</h1>
                <p class="text-white text-lg mt-2 mb-4">Busca las mejores series riders del país.</p>
                    <!-- component -->
                    <!-- This is an example component -->
                    
                    @livewire('search')

                    
                </div>
            </div>

        </section>

        @livewire('series-index')

    </x-fast-view>

</x-app-layout>