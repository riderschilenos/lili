<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">

        <div class="container py-8 my-12 sm:my-2">
            <div class="card">
                <div class="card-body">
                    
                    <h1 class="text-2xl font-bold">CREAR NUEVO PEDIDO</h1>
                    <hr class="mt-2 mb-6">

                    @livewire('vendedor.pedidos-create')
                    
                
                </div>
            </div>

        </div>

        <x-slot name="js">

        </x-slot>

    </x-fast-view>

</x-app-layout>