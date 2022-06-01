<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2">
        <div class="container py-8 ">      
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center">Registro RCH</h1>
                    
                            <div class="mx-auto flex justify-center mt-4">
                                            
                                <a href="{{route('garage.vehiculo.create')}}">
                                    <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                                    
                                        Inscribe tu Juguete

                                    </button>
                                </a>
                            </div>
                    
                
                    <hr class="mt-2 mb-6">

                        
                        
                    @livewire('vehiculo.vehiculo-search')
                
                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </x-fast-view>

</x-app-layout>