<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
    
        <div class="max-w-7xl mx-auto py-8">

            <div class="card">
                
                    

                  

                   

                    @livewire('socio.socio-search')
                    
                
            </div>

        </div>  

    </x-fast-view>

</x-app-layout>