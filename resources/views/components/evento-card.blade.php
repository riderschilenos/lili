@props(['evento'])

<article class="card flex flex-col">
                @isset($evento->image)
                    <a href="{{route('ticket.evento.show', $evento)}}"><img class="h-36 w-full object-cover" src=" {{Storage::url($evento->image->url)}}" alt=""></a>
                @else
                    <img loading="lazy" class="h-36 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">

               @endisset

               <div class="card-body flex flex-1 flex-col">
                   <a href="{{route('ticket.evento.show', $evento)}}"><h1 class="card-tittle">{{Str::limit($evento->titulo,40)}}</h1></a>
                   <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$evento->disciplina->name}}</p> 
                   <p class="text-gray-500 text-sm mb-2">Filmmaker: {{$evento->organizador->first()->name}}</p>
                   <p class="text-gray-500 text-sm mb-2 "><b>{{$evento->videos_count}}</b> Capítulos </p> 
                   

                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$evento->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$evento->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$evento->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$evento->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$evento->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto"> 
                            <i class="fas fa-users"></i>
                            ({{$evento->sponsors_count}})
                        </p>
                    </div>

                    @can('enrolled', $evento)

                        <a href= "{{route('eventos.show', $evento)}}" class="btn btn-success btn-block mt-10">
                            Ver evento
                        </a>

                    @else 
                        @if ($evento->entrada == 0)
                        <p class="my-2 text-green-800 font-bold">GRATIS</p>
                        @else
                            <p class="my-2 text-gray-500 font-bold">${{number_format($evento->entrada)}}</p>
                        @endif

                        <a href= "{{route('ticket.evento.show', $evento)}}" class="btn btn-danger btn-block">
                            Obtener
                        </a>

                    @endcan



                    
               </div>
</article>