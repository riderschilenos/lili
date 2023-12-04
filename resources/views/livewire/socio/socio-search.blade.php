<div class="mb-8" x-data="setup()">
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
    <div class="grid grid-cols-3"> 
        <div class="col-span-3 md:col-span-2 order-2 md:order-1">
            <div class="bg-white w-full max-w-5xl mx-auto px-2 lg:px-2 py-2 my-2 shadow-md rounded-md flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2 lg:pr-8 lg:border-r-2 lg:border-slate-300 flex justify-center items-center my-auto">
                
                    <div class="hidden md:flex justify-center my-auto items-center w-full max-w-sm h-36" style="perspective:1000px">
                        <div id="creditCard" class="cursor-pointer transition-transform duration-500 " style="transform-style:preserve-3d">
                            <div class="flex justify-center w-full h-36  my-auto items-center mx-auto rounded-xl text-white shadow-2xl" style="backface-visibility:hidden">
                                <img src="{{asset('img/strava/strava.jpg')}}" class=" object-cover w-full h-full rounded-xl" />
                            
                            </div>
                        
                        </div>
                    </div>
                
            
                </div>
                <div class="w-full lg:w-1/2 lg:pl-8">
                    <div class="flex justify-center pb-2 items-center">
                        <div class="bg-white rounded-lg profile-card w-96">
                        
                            <div class="text-center mb-4">
                                <div class="grid grid-cols-3">
                                    <div class="flex md:hidden">
                                        <div class="w-full h-20  my-auto items-center m-auto rounded-xl text-white shadow-2xl" style="backface-visibility:hidden">
                                            <img src="{{asset('img/strava/strava.jpg')}}" class="relative object-cover w-full h-full rounded-xl" />
                                        
                                        </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-3">
                                        <h2 class="text-xl font-semibold">¿Cuanto Kilómetros Hemos Pedaleado?</h2>
                                    </div>

                                </div>
                            
                            
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-2 bg-gray-100 rounded-lg">
                                
                                    <p class="text-lg font-semibold mt-2">12.000 km</p>
                                    <p class="text-sm text-gray-600">Total</p>
                                </div>
                                <div class="text-center p-2 bg-gray-100 rounded-lg">
                                    <p class="text-lg font-semibold mt-2">1.654 km</p>
                                    <p class="text-sm text-gray-600">Ultimos 7 Días</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            
            </div>
        </div>

            <div class="col-span-3 md:col-span-1 order-1 md:order-2">
                <div>
                    <h1 class="text-center font-bold mt-4 text-2xl">¿Cuántos Riders Hay en Chile?</h1>
                </div>
                
                        
        
                <div class="mt-4 grid grid-cols-1 lg:grid-cols-3">
                    
                    <div>
                
                    </div>
                
                    
                    <div class="block">
                        <div class="flex justify-center ">
                
                            
                                
                            <button @click="activeTab = 0" class="btn text-white text-sm w-full max-w-xs items-center justify-items-center mx-2" :class="activeTab===0? ' bg-red-600' : '  bg-gray-900'" >{{$bicicletas+$motos}}<br> TOTAL</button>
                            <button @click="activeTab = 1" class="btn text-white text-sm w-full max-w-xs items-center justify-items-center" :class="activeTab===1? ' bg-red-600' : '  bg-gray-900'" >{{$motos}}<br> MOTO</button>
                            <button @click="activeTab = 2" class="btn text-white text-sm w-full max-w-xs items-center justify-items-center mx-2" :class="activeTab===2? ' bg-red-600' : '  bg-gray-900'" >{{$bicicletas}}<br> BICICLETA</button>
                        
                            
                
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
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                                <button class="btn btn-primary w-full items-center justify-items-center whitespace-nowrap">Perfil</button>
                                            </a>
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full items-center justify-items-center whitespace-nowrap">Suscripción</button>
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
            </div>
        </div>
        <div class="px-2 py-2">
            <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de un rider" autocomplete="off">
        </div>



        @if ($socios->count())

       
            <section class="mb-4 pt-2 pb-12">
               
                 
                      
                        <div x-show="activeTab===0">   
                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-y-4">
                                    
                                @foreach ($socios as $socio)

                            

                                        <x-socio-card :socio="$socio" />

                                    
                    
                                @endforeach
                            </div>
                        </div>
                        <div x-show="activeTab===1">
                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-y-4">
                
                                @foreach ($sociosmoto as $socio)

                            

                                        <x-socio-card :socio="$socio" />

                                    
                    
                                @endforeach
                            </div>
                        </div>
                        <div x-show="activeTab===2">
                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-y-4">
                
                                @foreach ($sociosbici as $socio)
                                        <x-socio-card :socio="$socio" />
                                @endforeach
                            </div>
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
    </div>
  
        <script>
         
        function setup() {
            return {
            activeTab: 0,
            tabs: [
                "TOTAL",
                "MOTO",
                "BICICLETA"
            ]
            };
        };
            document.addEventListener('livewire:load', function () {
                window.addEventListener('scroll', function() {
                    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                        @this.loadMore(); // Invocar un método para cargar más registros
                    }
                });
            });
        </script>




</div>
