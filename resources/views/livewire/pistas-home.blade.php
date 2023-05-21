<div class="my-6">
    <div class="max-w-7xl mx-auto px-2 pt-10 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:hidden gap-y-4">

        @foreach ($pistas as $pista)

            <article class="card grid grid-cols-6">

                <div class="col-span-2 items-center content-center my-auto px-2">
                        @isset($pista->image)
                                @if ($pista->type=='pista')
                                    <a href="{{route('ticket.pista.show', $pista)}}"><img class="h-44 object-contain my-auto content-center items-center" src=" {{Storage::url($pista->image->url)}}" alt=""></a>
                                @else
                                    <a href="{{route('ticket.evento.show', $pista)}}"><img class="h-44 object-contain my-auto content-center items-center" src=" {{Storage::url($pista->image->url)}}" alt=""></a>
                                @endif
                        @else
                            <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">

                    @endisset
                </div>
                    <div class="px-2 py-4 col-span-4">
                                    @if ($pista->type=='pista')
                                        <a href="{{route('ticket.pista.show', $pista)}}"><h1 class="card-tittle">{{Str::limit($pista->titulo,40)}}</h1>
                                    @else
                                        <a href="{{route('ticket.evento.show', $pista)}}"><h1 class="card-tittle">{{Str::limit($pista->titulo,40)}}</h1>
                                    @endif
                                    <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$pista->disciplina->name}}</p> 
                                    <p class="text-gray-500 text-sm mb-2">Organizador: {{$pista->organizador->first()->name}}</p>
                                    <p class="text-gray-500 text-sm mb-2 "><b>{{$pista->fechas_count}}</b> Entrenamientos </p> 
                                    

                                    </a>

                                    @php
                                    $min=0;
                                    $max=0;
                                @endphp
                                @foreach ($pista->fechas as $fecha)
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
                                    
                                    @if ($pista->type=='pista')
                                        
                                    
                                        @if ($min == 0 && $max==0)
                                        
                                            <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                Inscripcion GRATIS
                                                </a>
                                                
                                        @elseif($min==$max)
                                            <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                            
                                            <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                ${{number_format($min)}}
                                            </a>

                                        @else
                                            <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                            
                                            <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                ${{number_format($min)}} - ${{number_format($max)}}
                                            </a>

                                        @endif
                                    @else
                                            @if ($min == 0 && $max==0)
                                                    
                                                <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    Inscripcion GRATIS
                                                    </a>
                                                    
                                            @elseif($min==$max)
                                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                
                                                <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    ${{number_format($min)}}
                                                </a>

                                            @else
                                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                
                                                <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    ${{number_format($min)}} - ${{number_format($max)}}
                                                </a>

                                            @endif                                  
                                    @endif

                                        <div class="flex mt-2">
                                            <p class="text-gray-500 text-md mb-2">Riders c/ Entrada</p>
                                            <p class="text-sm text-gray-500 ml-auto"> 
                                                <i class="fas fa-users"></i>
                                                ({{$pista->inscritos_count}})
                                            </p>
                                        </div>

                                       



                            
                    </div>

            </article>
            
        @endforeach

    </div>
</div>
