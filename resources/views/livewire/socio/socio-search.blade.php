<div class="mb-8">
    @php

    $bicicletas=0;
    $motos=0;

        foreach ($sociosfull as $socio) {
            
           
                if ($socio->disciplina_id==2 or $socio->disciplina_id==4 or $socio->disciplina_id==5 or $socio->disciplina_id==8 ) {
                    $bicicletas+=1;}
                else {
                    $motos+=1;
                
                }    
            
            
        }


    @endphp
     <div>
        <h1 class="text-center font-bold mt-4 text-2xl">¿Cuántos Riders Hay en Chile?</h1>
    </div>

            <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4 mx-4">
                
                <div>
            
                </div>
               
                <div class="hidden sm:block">
                    <div class="flex justify-end mr-4 ">
            
                        
                        <div class="grid grid-cols-3 gap-3">
                                <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas+$motos}}<br> TOTAL</button>
                                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
                                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas}}<br> BICICLETA</button>
                               
                        </div>
                        
            
                    </div>
                </div>
                <div class="block sm:hidden">
                    <div class="flex justify-center ">
            
                        
                            
                            <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center mr-2">{{$bicicletas+$motos}}<br> TOTAL</button>
                     
                            <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
                       
                      
                            <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ml-2">{{$bicicletas}}<br> BICICLETA</button>
                            
                        
            
                    </div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4">
                   
                <div>

                </div>
               
                <div class="hidden sm:block">
                    <div class="flex justify-center mr-4 ">

                        
                            @if(auth()->user())
                                @if(auth()->user()->socio)
                                    <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                        <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                    </a>
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Suscripción</button>
                                    </a>
                                    </div>
                                @else
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                    </a>
                                @endif
                            @else
                                <a href="{{route('socio.create')}}">
                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                </a>
                            @endif    
                        

                    </div>
                </div>
           
            </div>
        <div class="px-6 pb-2">
            <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de un rider" autocomplete="off">
        </div>



        @if ($socios->count())

        
            <section class="mb-4 pt-2 pb-12">
               
                <div class="max-w-7xl mx-auto px-2 sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-x-2 gap-y-4">

                    @foreach ($socios as $socio)

                        

                            <x-socio-card :socio="$socio" />

                        
        
                    @endforeach
        
                </div>
            
            </section>
            
            
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 
        
        <div class="flex justify-center text-gray-400 px-6 py-4">
            Cargando....
         </div>
        <div class="px-6 py-4">
            {{$socios->links()}}
        </div>

        <script>
            document.addEventListener('livewire:load', function () {
                window.addEventListener('scroll', function() {
                    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                        @this.loadMore(); // Invocar un método para cargar más registros
                    }
                });
            });
        </script>




</div>
