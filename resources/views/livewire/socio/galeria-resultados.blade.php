<div>
    
           
    <style>
        .slider::-webkit-scrollbar {
      display: none;
    }
    </style>
    
        <div class="max-w-5xl mx-auto">
            @php
                $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            @endphp
            
    <div class="px-2 my-2">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Buscar por Nombre del Dueño" autocomplete="off">
    </div>

            <ol class="">
                @if ($resultados->count()>0)
                    @foreach ($resultados as $resultado)
                        
                            <li class="bg-gray-100 rounded-lg px-2 py-1 my-2 mx-1 shadow-lg" x-data="{slr: false}">
                               
                                <div class="flex justify-center  rounded-lg p-1 items-center">
                                    <h3 class="text-lg font-semibold text-gray-700 cursor-pointer text-center" wire:click="setresultado({{$resultado->id}})">
                                          
                                          {{$resultado->titulo}}</h3>
                                 
                                </div>
                                @if ($resultadoid==$resultado->id)
                                    
                                    <div>
                                        <ul class="raider snap-mandatory flex overflow-x-auto gap-0 snap-x before:shrink-0 before:w-[30vw] after:shrink-0 after:w-[30vw]" style='z-index: 1 ; ' wire:click="resetresultado()">
                                            @if ($resultado->image->count()>0)
                                                @php
                                                    $n=1;
                                                @endphp
                                                @foreach ($resultado->image as $image)
                                                    <li class="shrink-0 snap-center w-full snap-mandatory">       
                                                        <img class="" src="{{Storage::url($image->url)}}" alt="" style="scroll-snap-align: center;">
                                                        <p class="text-center my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500">({{$n.'/'.$resultado->image->count()}})</p>
                                                    </li>
                                                    @php
                                                        $n+=1;
                                                    @endphp
                                                @endforeach
                                            @else
                                                <li class="shrink-0 snap-center w-full snap-mandatory">       
                                                    <img class="" src="{{asset('img/copa.png')}}" alt="" style="scroll-snap-align: center;">
                                                </li>
                                            @endif
                                            
                                                                
                                        </ul>
                                    </div>
                                
                                @endif
                                <article class="grid grid-cols-6">
                                  
                                    @if ($resultadoid!=$resultado->id)
                                        
                                        <div class="px-2 py-2 col-span-4 ">
                                            <div class="flex justify-start ">
                                                <div class="items-center my-2">
                                                    <div wire:click="setresultado({{$resultado->id}})">
                                                        <p class="text-gray-500 text-base font-bold cursor-pointer">{{$resultado->descripcion}}</p>
                                                    </div>
                                                    @if ($resultado->user)
                                                        @if ($resultado->user->socio)
                                                            <a href="{{route('socio.show', $resultado->user->socio)}}">
                                                            </a>  
                                                        @else
                                                            -
                                                        @endif
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        
                                        </div>
                                    @elseif ($resultadoid==$resultado->id)
                                        <div class="px-2 py-2 col-span-6 ">
                                            <div class="flex justify-center ">
                                                <div class="items-center my-2">
                                                    <div wire:click="setresultado({{$resultado->id}})">
                                                        <p class="text-gray-500 text-base font-bold cursor-pointer">{{$resultado->descripcion}}</p>
                                                    </div>
                                                    <a href="{{route('socio.show', $resultado->user->socio)}}">
                                                        <h1 class="text-blue-400 font-bold text-lg leading-8 mb-1 mt-2">{{ '@'.$resultado->user->socio->slug }}</h1>
                                                    </a>  
                                                </div>
                                            </div>
                                        
                                        </div>
                                    @endif
                                    @if ($resultadoid!=$resultado->id)
                                        <div class="col-span-2 items-center content-center my-auto">
                                        
                                            
                                                                    @if($resultado->image->first())
                                                                    
                                                                        <img class="w-full h-32 object-contain content-center items-center " src=" {{Storage::url($resultado->image->first()->url)}}" alt="" wire:click="setresultado({{$resultado->id}})">
                                                                    @else
                                                                        <img class="w-full h-32 object-contain content-center items-center " src="{{asset('img/copa.png')}}" alt="" wire:click="setresultado({{$resultado->id}})">
                                                                    
                                                                    @endif    
                                                                    
                                                            
                                                    
                                            
                                        </div>
                                    @endif
                                
                                </article>
                                <article class="grid grid-cols-6">
                                    <div class="px-2 col-span-4 ">
                                        
                                        <div class="flex justify-end  rounded-lg px-1 items-center">
                                            @can('perfil_propio', $resultado->user->socio)
                                            <time class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">
                                        
                                                {{$meses[date('n', strtotime($resultado->fecha))-1]}}
                                                {{date('Y', strtotime($resultado->fecha))}}
                                        
                                            </time>
                                            -
                                            <a href="{{route('socio.resultados.edit',$resultado)}}" class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">editar</a>
                                            @else
                                                <time class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">
                                        
                                                    {{$meses[date('n', strtotime($resultado->fecha))-1]}}
                                                    {{date('Y', strtotime($resultado->fecha))}}
                                            
                                                </time>
                                            @endcan
                                        </div>
                                    
                                    </div>
                                    <div class="col-span-2 items-center content-center my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                     
                                          
                                                                @if($resultado->image->first())
                                                                
                                                                    <p class="text-center">({{'1/'.$resultado->image->count()}})</p>
                                                                @else
                                                                   <p class="text-center">({{'0/0'}})</p>
                                                                 
                                                                @endif    
                                                                
                                                           
                                                  
                                         
                                    </div>
                                    
                                    
                                
                                </article>
                            
    
                            </li>
    
                    @endforeach
               
                @endif
                   
               
              
               
            </ol>
           
          
        
        </div>

        
        <h1 class="text-center text-xs text-gray-400 py-6 mb-12">Todos Los derechos Reservados</h1>
        

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
    