<div>
    <div class="bg-gray-200 py-4 mb-8 hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los eventos
            </button>
          
                <!-- Dropdown Filmmaker -->
                <div class="relative" x-data="{ open: false}" >
                    <div>
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                            <i class="fas fa-biking text-sm mr-2"></i>
                            Organizador
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                    </div>
                
                    <!--
                    Dropdown menu, show/hide based on menu state.
                
                    Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-on:click.away="open = false">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        @foreach ($filmmakers as $filmmaker)
                            <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('filmmaker_id',{{$filmmaker->user_id}})" x-on:click="open = false">
                                {{$filmmaker->name}}
                            </a>
                        @endforeach
                        
                        
                    </div>
                    </div>
                </div>

                <!-- Dropdown Disciplina -->
                <div class="relative" x-data="{ open: false}" >
                    <div>
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                            <i class="fas fa-biking text-sm mr-2"></i>
                            Disciplina
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                    </div>
                
                    <!--
                    Dropdown menu, show/hide based on menu state.
                
                    Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-on:click.away="open = false">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        @foreach ($disciplinas as $disciplina)
                            <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('disciplina_id',{{$disciplina->id}})" x-on:click="open = false">
                                {{$disciplina->name}}
                            </a>
                        @endforeach
                        
                        
                    </div>
                    </div>
                </div>
  

        </div>
    </div>  
    
  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($eventos as $evento)
            <div class="hidden sm:block">
                <x-evento-card :evento="$evento" />   
            </div>
                <div class="block sm:hidden">
                    <article class="grid grid-cols-6 shadow-lg rounded-lg bg-main-color">
    
                        <div class="col-span-2 items-center content-center my-auto px-2 py-2">
                            @if ($evento->type=='evento')
                                <a href="{{route('ticket.evento.show', $evento)}}"><h1 class="text-white text-base mb-2 py-2 font-bold text-center">{{Str::limit($evento->titulo,40)}}</h1>
                            @else
                                <a href="{{route('ticket.evento.show', $evento)}}"><h1 class="text-white text-base mb-2 font-bold">{{Str::limit($evento->titulo,40)}}</h1>
                            @endif
                                @isset($evento->image)
                                        @if ($evento->type=='evento')
                                            <a href="{{route('ticket.evento.show', $evento)}}"><img class="w-full h-32 object-contain my-auto content-center items-center" src=" {{Storage::url($evento->image->url)}}" alt=""></a>
                                        @else
                                            <a href="{{route('ticket.evento.show', $evento)}}"><img class="w-full h-32 object-contain my-auto content-center items-center" src=" {{Storage::url($evento->image->url)}}" alt=""></a>
                                        @endif
                                @else
                                    <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
        
                            @endisset
                        </div>
                            <div class="px-2 py-2 col-span-4 bg-white">
                                <a href="{{route('ticket.evento.show', $evento)}}">
                                            <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$evento->disciplina->name}}</p> 
                                            <p class="text-gray-500 text-sm mb-2">Organizador: {{$evento->user->name}}</p>
                                            <p class="text-gray-500 text-sm mb-2 "><b>+{{$evento->fechas_count}}</b> Entrenamiento Realizado </p> 
                                            
        
                                            </a>
        
                                            @php
                                            $min=0;
                                            $max=0;
                                        @endphp
                                    @if ($evento->fechas->count()>0)
                                        
                                
                                        @foreach ($evento->fechas as $fecha)
                                            @foreach($fecha->categorias as $categoria)
                                                @php
                                                    if ($min==0) {
                                                        $min=$categoria->inscripcion;
                                                        $max=$categoria->inscripcion;
                                                    }else{
                                                        if ($categoria->inscripcion<$min) {
                                                            $min=$categoria->inscripcion;
                                                        }elseif($categoria->inscripcion>$max){
                                                            $max=$categoria->inscripcion;
                                                        }
                                                    }
                                                
                                                @endphp    
                                            @endforeach
                                        @endforeach
                                
                                        
                                    @endif    
                                            @if ($evento->type=='evento')
                                                
                                            
                                                @if ($min == 0 && $max==0)
                                                
                                                    <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                        Inscripcion GRATIS
                                                        </a>
                                                        
                                                @elseif($min==$max)
                                                    <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                                    
                                                    <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                        ${{number_format($min)}}
                                                    </a>
        
                                                @else
                                                    <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                                    
                                                    <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                        ${{number_format($min)}} - ${{number_format($max)}}
                                                    </a>
        
                                                @endif
                                            @else
                                                    @if ($min == 0 && $max==0)
                                                            
                                                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                            Inscripcion GRATIS
                                                            </a>
                                                            
                                                    @elseif($min==$max)
                                                        <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                        
                                                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                            ${{number_format($min)}}
                                                        </a>
        
                                                    @else
                                                        <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                        
                                                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn bg-gray-300 btn-block">
                                                            ${{number_format($min)}} - ${{number_format($max)}}
                                                        </a>
        
                                                    @endif                                  
                                            @endif
                                                <a href="{{route('ticket.evento.show', $evento)}}">
                                                    <div class="flex mt-2">
                                                        <p class="text-gray-500 text-md ">Riders c/ Entrada</p>
                                                        <p class="text-sm text-gray-500 ml-auto"> 
                                                            <i class="fas fa-users"></i>
                                                            ({{$evento->inscritos_count}})
                                                        </p>
                                                    </div>
                                                </a>
        
                                                <ul class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 gap-y-2 mt-4">
                                                    @php
                                                        $n=0;
                                                    @endphp
                                                @foreach ($evento->fechas as $fecha)
                                                    
                                                    @if ($fecha->fecha>=now()->subDays(1))
                                                        <li class="text-center">
                                                            <div class="pb-5 bg-red-600 text-white py-2 rounded-lg">
                                                                @php
                                                                    $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                                                @endphp
                                                                <a href="{{route('ticket.evento.show', $evento)}}">
                                                                    @if ($fecha->name=='keyname')
                                                                    <div class="flex">
                                                                        <p class="font-bold text-white mx-4 my-auto items-center">¿Cuando?</p>
                                                                        <p class="sm:hidden font-bold text-white ml-auto mr-4"> 
                                                                        {{date('d/m/Y', strtotime($fecha->fecha))}}
                                                                        </p>
                                                                        <p class="hidden sm:block font-bold text-white ml-auto mr-4"> 
                                                                            {{$dias[date('N', strtotime($fecha->fecha))-1]}} {{date('d/m/Y', strtotime($fecha->fecha))}}
                                                                        </p>
                                                                    </div>
                                                                
                                                                    @else
                                                                        <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </li>
                                                    
                                                        @php
                                                            $n+=1;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                        @if ($n==0)
                                                            <div class="text-center">
                                                                <div class="flex items-center justify-center pb-5 bg-red-600 p-2 text-white py-2 rounded-lg">
                                                                    @php
                                                                        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                                                    @endphp
                                                                    
                                                                <label class="mx-auto text-center font-bold"> No hay Entranamientos Anunciados
                                                                        
                                                                </div>
                                                            </div>
                                                        @endif
                                            </ul>
        
        
        
                                    
                            </div>
        
                    </article>  
                </div>     

        @endforeach

    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $eventos->links() }}
    </div>
    
    <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>

</div>
