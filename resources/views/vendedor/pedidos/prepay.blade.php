<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2">
        
            @livewire('vendedor.pedidos-pay')

    </x-fast-view>
    
    
</x-app-layout>