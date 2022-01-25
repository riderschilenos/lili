<x-app-layout>

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Vende tu Juguete Rider</h1>
                <hr class="mt-2 mb-6">

                
                @livewire('vehiculo.vehiculo-create')

            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>
    

</x-app-layout>