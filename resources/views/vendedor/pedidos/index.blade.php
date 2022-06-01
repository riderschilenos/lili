<x-app-layout>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        @livewire('vendedor.pedidos-index')
        
    </x-fast-view>
</x-app-layout>