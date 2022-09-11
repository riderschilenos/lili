<x-app-layout>
   
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">

        <div class="max-w-7xl mx-auto px-4 py-8">

            <div class="card pb-8">
                <div class="card-body">
                    

                    <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
                
                        <div>

                        </div>
                        <div>
                            <h1 class="text-2xl font-bold pb-4 text-center">Suscripción Club Riders Chilenos</h1>
                            
                        </div>
                    
                    </div>

                    
                    @livewire('socio.socio-create')

                    
                    
                </div>
            </div>

        </div>
        

        <x-slot name="js">
            
            <script src="{{asset('js/socio/form.js')}}"></script>
            
            
        </x-slot>
        
    </x-fast-view>
    
</x-app-layout>