<div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex justify-center items-center">
            <div>
                <div class="pr-4 bg-blue-500 p-2 rounded-lg text-center mb-4">
                    @php
                        $lugar=1;
                        foreach ($evento->tickets()->where('status', 1)->orderBy('id', 'asc')->get() as $item) {
                            if ($item->id==$ticket->id) {
                                break;
                            }
                            $lugar+=1;
                        }
                    @endphp
                    <p class="text-4xl font-bold text-white">{{$evento->tickets()->where('status', '>=', 3)->count()+$lugar}}</p>
                    <p class="text-sm text-white">Nro reservado</p>
                </div>

                @if ($evento->type=='pista')
                    <p class="text-base leading-none my-auto mx-auto text-center">En qué Cilindrada vas entrenar?</p>
                @else
                    <p class="text-base leading-none my-auto mx-auto text-center">En que categoria deseas competir?</p>
                @endif
                @if ($evento->eliminable=='si')
                    <div id="liveClock" class="text-base mt-4 mx-auto text-center"></div>
                @endif
               
            </div>
              

        </div>    
    <div class="grid grid-cols-1 justify-center">
        @if (IS_NULL($categoria_id))
            @foreach ($fecha->categorias as $item)
                    
                    @if ($evento->datos!=null || $evento->type=='desafio' || $evento->fechas->count()>1)

                    @if ($item->limite==0)
                        <button wire:click="set_categoria({{$item->id}})" class="btn btn-danger text-white mx-2 text-md my-2">
                            {{$item->categoria->name}}-${{number_format($item->inscripcion)}}
                        </button>
                    @else
                        <button wire:click="set_categoria({{$item->id}})" class="btn btn-danger text-white mx-2 text-md my-2 flex justify-between items-center">
                            {{$item->categoria->name}}-${{number_format($item->inscripcion)}}  <p class="text-xs">({{$item->limite}} Cupos Disponibles)</p>
                        </button>
                    @endif
                      
                          
                      
                    @else
                        <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                            @csrf
                            

                            <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                            <input name="categoria_id" type="hidden" value="{{$item->categoria->id}}">

                            <input name="fecha_categoria_id" type="hidden" value="{{$item->id}}">
                            <input name="nro" type="hidden" value="{{$nro}}">

                            <input name="cantidad" type="hidden" value="{{$item->inscripcion}}">
                            <input name="fecha_id" type="hidden" value="{{$fecha->id}}">
                            
                                
                            @if ($item->limite==0)
                                <button class="btn btn-danger text-white mx-2 text-md my-2 w-full">
                                    {{$item->categoria->name}}-${{number_format($item->inscripcion)}}
                                </button>
                            @else
                                <button class="btn btn-danger text-white mx-2 text-md my-2 w-full flex justify-between items-center">
                                    {{$item->categoria->name}}-${{number_format($item->inscripcion)}} <p class="text-xs">({{$item->limite}} Cupos Disponibles)</p>
                                </button>
                            @endif
                              

                        </form>
                      
                    @endif

            @endforeach
        @else
            @if ($fechacategoria->limite==0)
                <button wire:click="categoria_clean" class="btn btn-danger text-white mx-2 text-md my-4 flex justify-between items-center">
                    {{$fechacategoria->categoria->name}}-${{number_format($fechacategoria->inscripcion)}} 
                </button>
            @else
                <button wire:click="categoria_clean" class="btn btn-danger text-white mx-2 text-md my-4 flex justify-between items-center">
                    {{$fechacategoria->categoria->name}}-${{number_format($fechacategoria->inscripcion)}} <p class="text-xs">({{$fechacategoria->limite}} Cupos Disponibles)</p>
                </button>
            @endif

           

        @endif
      
 
</div>
        @if ($evento->type=='carrera' || $evento->type=='campeonato')
            
            <div class="flex justify-center hidden">      
                <select wire:model="selectedcategoria" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @if ($evento->type=='pista')
                        <option value="">--Cilindrada--</option>
                    @else
                        <option value="">--Categoria--</option>
                    @endif
                    @foreach ($fecha->categorias as $item)

                        <option value="{{$item->id}}">{{$item->categoria->name}}-${{number_format($item->inscripcion)}}</option>
                        
                    @endforeach
                </select>
            </div>
            
        @endif
    </div>

        @foreach ($ticket->evento->fechas as $fecha)
            @if ($fecha->fecha>=now()->subDays(1))
                <div class="flex items-center justify-between pb-5 px-8 bg-blue-900 text-white py-2 my-4">
                    
                    @if ($fecha->name=='keyname')
                        <label class="mx-4"> Entrenamiento {{date('d/m/Y', strtotime($fecha->fecha))}}
                        </label>
                    @else
                        <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                    @endif
                                    
            
                    
                    
                    @if ($categoria_id)  
                        @if($ticket->evento->type=='pista')
                            <div class="">
                                <p class="text-base leading-none mx-auto text-center">Categoria:  </p>
                                <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center">{{$fechacategoria->categoria->name}}</h1>
                            </div>
                        @endif
                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                        </div>
                        <div class="block">
                            @if ($evento->type=='pista')
                                
                                    <p class="ml-4">Cuantas Motos? </p>
                                    <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 ml-4 rounded-lg">
                                    
                                    <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                        <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                    </div>

                                
                            @elseif($evento->type=='desafio' || $evento->disciplina_id==5)
                                    
                            @elseif($evento->datos!=null)
                            
                                    @if (($evento->disciplina_id==2) || ($evento->disciplina_id==4) || ($evento->disciplina_id==5) || ($evento->disciplina_id==8))
                                        <p class="ml-4">Número: </p>
                                    @else
                                        <p class="ml-4">Número de Moto: </p>
                                    @endif
                                    <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 rounded-lg">
                                    
                                    <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                        <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                    </div>

                            
                            @endif

                   
                     

                    </div>
                    
                    <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                        @csrf
                        

                        <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                        <input name="categoria_id" type="hidden" value="{{$categoria_id}}">
                        <input name="fecha_categoria_id" type="hidden" value="{{$fechacategoria->id}}">
                        <input name="nro" type="hidden" value="{{$nro}}">
                        <input name="cantidad" type="hidden" value="{{$fechacategoria->inscripcion}}">
                        <input name="fecha_id" type="hidden" value="{{$fecha->id}}">

                        <button class="btn bg-blue-500 text-white mt-2 ml-4" type="submit">Agregar</button>
                    </form>   
                        <p wire:click="add({{$fecha}})" class="hidden font-bold py-2 px-4 rounded bg-blue-500 text-white">Agregar</p>



                    @else
                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                        </div>
                        @if ($evento->type=='pista')
                            <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una cilindrada</p>
                        @else
                            <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una categoria</p>
                        @endif
                    @endif        
                </div>
            @endif
        @endforeach

    
        <script>
            // Función para actualizar el reloj en vivo
            function updateLiveClock() {
                // Obtener la fecha de creación del ticket
                var createdAt = new Date("{{ $ticket->created_at }}");
    
                // Obtener la fecha actual
                var currentTime = new Date();
    
                // Calcular la diferencia en milisegundos
                var difference = 10 * 60000 - (currentTime - createdAt);
    
                // Verificar si el tiempo restante es mayor que 0
                if (difference > 0) {
                    // Calcular horas, minutos y segundos
                    var hours = Math.floor(difference / 3600000);
                    var minutes = Math.floor((difference % 3600000) / 60000);
                    var seconds = Math.floor((difference % 60000) / 1000);
    
                    // Agregar un 0 al inicio si los minutos o segundos son menores a 10
                    var formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
                    var formattedSeconds = seconds < 10 ? "0" + seconds : seconds;
    
                    // Actualizar el contenido del elemento con el tiempo restante
                    document.getElementById("liveClock").innerHTML =
                        "Tienes <b>[" +
                            formattedMinutes +
                            ":" +
                            formattedSeconds +
                            "]"+
                        "</b> para ingresar tu categoria y pagar tu inscripción, luego tu cupo sera cedido a otra persona y tendrás que realizar el proceso de inscripción nuevamente desde el comienzo.";
                } else {
                    document.getElementById("liveClock").innerHTML = "Tiempo agotado";
                    // Si el tiempo restante es menor o igual a 0, redirigir a la ruta especificada
                    window.location.href = "{{ route('checkout.evento', $ticket->evento) }}";
                }
    
                // Actualizar cada segundo
                setTimeout(updateLiveClock, 1000);
            }
                        // Llamar a la función al cargar la página
            window.onload = updateLiveClock;
        </script>
            {{-- PREFICHA --}}

</div>
