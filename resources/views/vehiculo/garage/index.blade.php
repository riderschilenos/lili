<x-app-layout>

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Mis Vehiculos</h1>

                <p class="text-gray-500 text-sm mb-2 text-center">Vendedor: {{auth()->user()->name}}</p>
                <hr class="mt-2 mb-6">

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8">
                    
                    <div>
                    @if(auth()->user()->vehiculos->count())
                        <h1 class="text-xl text-center mb-4 font-bold">Vehiculos disponibles para la venta</h1>
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-8">

                            @foreach (auth()->user()->vehiculos as $vehiculo)
                                @if($vehiculo->status==1 || $vehiculo->status==3)
                                    <x-mivehiculo-card :vehiculo="$vehiculo" />        
                                @endif
                            @endforeach
                    
                        </div>
                    
                    @else
                        <div class="px-6 py-4 text-center">
                            No hay ningun registro 
                        </div>
                        <div class="mx-auto flex justify-center">
                            
                            <a href="{{route('garage.vehiculo.vender')}}">
                                <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4" wire:click="resetFilters">
                                
                                    Vende tu Juguete
        
                                </button>
                            </a>
                        </div>
                    @endif
                    </div>
                    <div>
                    @if(auth()->user()->socio)
                        <h1 class="text-xl text-center mb-4 font-bold">Mi registro de vehiculos</h1>
                        @if(auth()->user()->socio->count())
                            
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-8">

                                @foreach (auth()->user()->vehiculos as $vehiculo)
                                    @if($vehiculo->status==2)
                                        <x-mivehiculo-card :vehiculo="$vehiculo" />        
                                    @endif
                                @endforeach
                        
                            </div>
                        
                        @else
                            <div class="px-6 py-4 text-center">
                                No hay ningun registro 
                            </div>
                            <div class="mx-auto flex justify-center">
                                
                                <a href="{{route('garage.vehiculo.vender')}}">
                                    <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4" wire:click="resetFilters">
                                    
                                        Vende tu Juguete
            
                                    </button>
                                </a>
                            </div>
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>
    

</x-app-layout>