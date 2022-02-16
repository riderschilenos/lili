<x-app-layout>

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Registro RCH</h1>

               
                <hr class="mt-2 mb-6">

                    
                    
                                <h1 class="text-xl text-center mb-4 font-bold">(Pronto Habilitamos el Buscador)</h1>
                            @if($vehiculos->count())
                                
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                                    @foreach ($vehiculos as $vehiculo)
                                        @if($vehiculo->status==5)
                                            <x-mivehiculo-card :vehiculo="$vehiculo" />        
                                        @endif
                                    @endforeach
                            
                                </div>
                            
                            @else
                                <div class="px-6 py-4 text-center">
                                    No hay ningun registro de vehiculo en venta
                                </div>
                                
                            @endif
                    
               
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>
    

</x-app-layout>