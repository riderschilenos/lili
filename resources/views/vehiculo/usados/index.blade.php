<x-app-layout>
    
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        @livewire('usados-index')

    </x-fast-view>

</x-app-layout>