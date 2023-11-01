<x-app-layout>
    <x-slot name="tl">
            
        <title>Videos RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <div class="words sm:hidden bg-white pt-2 overflow-x-auto whitespace-no-wrap border-b-2 font-bold text-gray-700">
            <div class="ml-4 pl-2 flex justify-center">
                <div class="px-4 py-2 cursor-pointer hover:underline text-gray-900" @click="user = false; home = false; socio = true; evento = false; registro = false; vendedor = false; base = false" >Riders</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="evento = true; user = false; home = false; socio = false; registro = false; vendedor = false; base = false" >Eventos</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="user = false; home = false; socio = false; evento = false; registro = true; vendedor = false; base = false" >Bikes</div>
                <div class="px-4 py-2 cursor-pointer underline text-gray-900" @click="user = false; home = false; video = true; socio = false; evento = false; registro = false; vendedor = false; base = false" >Videos</div>
                <div class="px-4 py-2 cursor-pointer hover:underline" @click="user = false; novedades = true; home = false; socio = false; evento = false; registro = false; vendedor = false; base = false" >Novedades</div>
            
            <!-- Agrega más categorías aquí -->
            </div>
        </div>

        @livewire('serie-status', ['serie' => $serie],key($serie->slug))
    
    </x-fast-view>

</x-app-layout>