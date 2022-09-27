@props(['evento'])

<article class="card flex flex-col">
                @isset($evento->image)
                    <a href="{{route('ticket.evento.show', $evento)}}"><img class="h-80 w-full object-cover" src=" {{Storage::url($evento->image->url)}}" alt=""></a>
                @else
                    <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">

               @endisset

               <div class="card-body flex flex-1 flex-col">
                   <a href="{{route('ticket.evento.show', $evento)}}"><h1 class="card-tittle">{{Str::limit($evento->titulo,40)}}</h1>
                   <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$evento->disciplina->name}}</p> 
                   <p class="text-gray-500 text-sm mb-2">Organizador: {{$evento->organizador->first()->name}}</p>
                   <p class="text-gray-500 text-sm mb-2 "><b>{{$evento->fechas_count}}</b> Fechas </p> 
                   
                   <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                </a>

                @php
                $min=0;
                $max=0;
            @endphp
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
                

                    <div class="flex mt-2">
                        <p class="text-gray-500 text-md mb-2">INSCRITOS</p>
                        <p class="text-sm text-gray-500 ml-auto"> 
                            <i class="fas fa-users"></i>
                            ({{$evento->inscritos_count}})
                        </p>
                    </div>

                    @can('enrolled', $evento)

                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn btn-success btn-block mt-10">
                            Ver evento
                        </a>

                    @else 
                        @if ($evento->entrada == 0)
                        <p class="my-2 text-green-800 font-bold">GRATIS</p>
                        @else
                            <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                            <div class="flex justify-between mb-4">
                                <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                    <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada)}}</p>
                                    <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                </div>
                                <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                    <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada_niño)}}</p>
                                    <p class="text-gray-500 text-sm text-center">Niños</p> 
                                </div>
                            </div>
                        @endif

                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn btn-danger btn-block">
                            Obtener
                        </a>

                    @endcan



                    
               </div>
</article>