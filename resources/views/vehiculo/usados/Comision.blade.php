<x-app-layout>

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Precio y Comisión</h1>
                <hr class="mt-2 mb-6">
                <p class="text-center">Para finalizar la publicacion de su vehiculo debe asignar un valor de venta y la modalidad de comision que desea pagar.</p>
                
                @livewire('vehiculo.vehiculo-comision', ['vehiculo' => $vehiculo], key('vehiculos-comision.'.$vehiculo->id))
                
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>
    

</x-app-layout>