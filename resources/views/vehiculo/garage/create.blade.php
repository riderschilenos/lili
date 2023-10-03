<x-app-layout>
    <x-slot name="tl">
            
        <title>Inscribe tu Juguete Rider</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
        <div class="container pb-8 pt-12 my-12">
            
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center">Inscribe tu Juguete Rider</h1>
                    <hr class="mt-2 mb-6">
                    <div class="bg-gray-100 border-t-4 mb-6 mx-3 border-gray-500 rounded-b text-gray-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                        <div>
                        <p class="text-base text-center">
                            Al registrar tu vehículo, garantizamos que cualquiera que busque el número de chasis del mismo en Google podrá identificar rápidamente quién es el propietario legítimo de la moto o bicicleta. El proceso de indexación en google puede tardar hasta 96 horas y es gratis.
                        </p>
                     <div>
                    
                    @livewire('vehiculo.vehiculo-inscripcion')


                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </x-fast-view>

</x-app-layout>