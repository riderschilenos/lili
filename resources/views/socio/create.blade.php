<x-app-layout>
    <x-slot name="tl">
            
        <title>Crear Nuevo Perfil Rider</title>
        
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
                    
                
        @php
            $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        @endphp
        <style>
            :root {
                --main-color: #4a76a8;
            }

            .bg-main-color {
                background-color: var(--main-color);
            }

            .text-main-color {
                color: var(--main-color);
            }

            .border-main-color {
                border-color: var(--main-color);
            }
        </style>

   
    
        <div class="max-w-7xl mx-auto px-4 py-8">

            <div class="card pb-8">
                <div class="card-body">
                    
                    <div class="bg-white font-sans flex items-center justify-center">
                        <div class="p-8">
                            <div class="max-w-md mx-auto">
                                <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                                    <h2 class="text-2xl font-semibold mb-2 text-blue-600">Hola {{Auth()->user()->name}}</h2>
                                    <p class="text-gray-700">¡Excelentes noticias! Su perfil ha sido creado exitosamente. Ahora puede comenzar a subir su foto y seguir completando la información de tu vida Rider.</p>
                                </div>
                            </div>
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