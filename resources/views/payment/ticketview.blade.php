 
<x-app-layout > 


  <x-slot name="tl">
            
    <title>Ticket Nro: {{$ticket->id}}</title>
</x-slot>

<x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
   
  @can('Super admin')
              
    <div class="flex justify-center mb-2">
      {!! Form::open(['route'=>['whatsapp.resend.ticket',$ticket] , 'method'=>'Post']) !!}
                    
    
        
          
              {!! Form::submit('  Resend Ticket Whatsapp', ['class'=>'btn btn-success']) !!}
          
      {!! Form::close() !!}

    </div>

  @endcan
  <div class="flex justify-center w-full bg-blue-900">
      
        
    <div class="rounded-lg mt-12 mb-28">
    
        <div class="z-10 bg-blue-900 rounded-lg pb-20">
          <div class="flex mb-24">
            <div class="bg-white w-full rounded-lg px-6 py-5 mx-4">
  
              
                <div class="w-full mx-12">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center justify-between  my-1">
                      <span class="mr-3 rounded-full bg-white">
  
                      <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                      
                      </span>
                      @if ($evento->type=='desafio')
                        <h2 class="text-xl mx-4">{{$evento->titulo}}</h2>

                        @else
                        <h2 class="text-xl mx-4">Entrada {{$evento->titulo}}</h2>
                        @endif
                      </div>
                     
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5"></div>
                    <div class="flex items-center">
                     
                      <div class="flex flex-col mx-auto">
                          @if ($evento->type=='desafio')
                              @if (auth()->user()->strava)
                                        
                                  @livewire('admin.strava-count', ['ticket' => $ticket], key($ticket->id))
                                    
                              @else
                                  
                                  

                                  <div class="bg-white p-6 rounded shadow-md">
                                      <h2 class="text-lg font-semibold mb-2">Enlazar perfil de Strava</h2>
                                      <div class="my-2">
                                          <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Logo_Strava.png" alt="Logo de Strava" class="object-cover h-14">
                                      </div>
                                      <p class="text-gray-600">Conecta tu cuenta de Strava y comienza a participar.</p>
                                      <div class="flex justify-center">
                                          <a href="https://www.strava.com/oauth/authorize?client_id=112140&response_type=code&redirect_uri=https://riderschilenos.cl/redireccion-strava&scope=profile:read_all,activity:read_all" class=" bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                                              Enlazar con Strava
                                          </a>
                                      </div>
                                      
                                      <p class="mt-4 text-sm text-gray-500">
                                          Al hacer clic en "Enlazar con Strava", serás redirigido a Strava para autorizar la conexión.
                                      </p>
                                  </div>
                              @endif   
                                      
                           
                        @else
                            @if ($ticket->user)
                              <a href="{{route('ticket.historial.view',$ticket->user)}}">
                                <img src="{{Storage::url($ticket->qr)}}" width="150px" class=" p-1">
                              </a>
                            @else
                                 <img src="{{Storage::url($ticket->qr)}}" width="150px" class=" p-1">
                            @endif
                          
                        @endif
                       
                      </div>
                     
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5 pt-5">
                      <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                      @if ($evento->type=='pista')
                        <h1 class="text-xs text-center">Información de pista</h1>
                      @else
                        <h1 class="text-xs text-center">Información de carrera</h1>
                      @endif
                      
                    
                    </div>
                      @foreach ($ticket->inscripcions as $inscripcion)
                          <div class="bg-gray-100 shadow mt-5">
                            <div class="flex items-center p-5 text-sm">
                              <div class="flex flex-col">
                                @if ($evento->type=='pista')
                                    <span class="text-center">Cilindrada</span>
                                @else
                                    <span class="text-center">Categoria</span>
                                @endif

                                <div class="font-semibold">{{$inscripcion->fecha_categoria->categoria->name}}</div>
              
                              </div>
                              <div class="flex flex-col ml-auto">
                                @if ($evento->type=='pista')
                                    <span class="text-sm text-center">Fecha</span>
                                @else
                                    <span class="text-sm text-center">Fecha</span>
                                @endif
                              
                                <div class="font-semibold text-center">
                                  @if ($inscripcion->fecha->name=='keyname')
                                      <label class="mx-4"> {{date('d/m/Y', strtotime($inscripcion->fecha->fecha))}}</label>
                                  @else
                                      <label class="mx-4"> {{$inscripcion->fecha->name}}</label>
                                  @endif
                                </div>
              
                              </div>
                              <div class="flex flex-col ml-auto">
                              
                              @switch($inscripcion->estado)
                                    @case(1)
                                            <div class="font-semibold text-center">
                                                <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                CERRADA
                                                </a>
                                            </div>
                                        @break
                                    @case(2)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn bg-gray-200 h-4 my-auto">
                                              SIN PAGAR
                                              </a>
                                            </div>
                                        @break
                                    @case(3)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-success h-4 my-auto">
                                              VIGENTE
                                              </a>
                                            </div>
                                        @break
                                      @case(4)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-danger h-4 my-auto">
                                                COBRADA
                                              </a>
                                            </div>
                                        @break
                                      @case(5)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-danger h-4 my-auto">
                                                COBRADA
                                              </a>
                                            </div>
                                        @break
                                    
                                @default
                                    
                              @endswitch
                              
              
                              </div>
                            </div>
                            
                            @if (auth()->user())
                              @if (auth()->user()->id==$ticket->evento->user_id)
                                @if ($inscripcion->estado==2 || $inscripcion->estado==3)
                                    <div class="flex justify-center px-5 pb-6 text-sm">
                                      <div class="font-semibold text-center">
                                          {!! Form::open(['route'=>['ticket.inscripcions.update',$inscripcion], 'method'=> 'PUT' ]) !!}
                                              @csrf
                                          {!! Form::submit('COBRAR', ['class'=>'btn btn-danger my-auto cursor-pointer']) !!}
                                          {!! Form::close() !!}
                                      </div>
                                    </div>
                                    
                                @endif
                               

                              @endif
                                
                            @endif
                            

                          </div>
                      @endforeach
                    
                    <div class="border-b border-dashed border-b-2 my-5 pt-5">
                      <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                      <h1 class="text-xs text-center">Información del Rider</h1>
                    
                    </div>
                    <div class="flex items-center px-5 pt-3 text-sm">
                      <div class="flex flex-col">
                        <span class="">Nombre</span>
                        @if ($ticket->ticketable_type=='App\Models\Socio')
                            <div class="font-semibold">{{$ticket->user->name}}</div>
                        @else
                            @foreach ($invitados as $item)
                                @if ($item->id==$ticket->ticketable_id)
                                    <div class="font-semibold">{{$item->name}}</div>
                                @endif
                                    
                            @endforeach
                           

                        @endif
                 
      
                      </div>
                     
                     
                     
                      @if($ticket->user)
                        @if ($ticket->user->socio)
                            @if ($ticket->user->socio->direccion)

                           
                              <div class="flex flex-col ml-6">
                                <span class="">Localidad</span>
                                <div class="font-semibold">{{Str::limit($ticket->user->socio->direccion->comuna.', '.$ticket->user->socio->direccion->region,20)}}</div>
              
                              </div>
                            @endif
                          @endif
                      @endif
                    </div>
                    <div class="flex flex-col py-5  justify-center text-sm ">
                      <h6 class="font-bold text-center">TICKET DE INGRESO</h6>
      
           
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
      
        </div>
  
    </div>
  </div>
      @php

          $endTime = $ticket->updated_at->addHours(48);

      @endphp
      <script>
        const clockDisplay = document.getElementById('clock');
        
        function updateClock() {
          const endTime = new Date(<?php echo json_encode($endTime) ?>);
          const currentTime =  new Date(); // Reemplaza con tu fecha de finalización

            const timeRemaining = endTime.getTime() - currentTime.getTime();

            const seconds = Math.floor((timeRemaining / 1000) % 60);
            const minutes = Math.floor((timeRemaining / (1000 * 60)) % 60);
            const hours = Math.floor(timeRemaining / (1000 * 60 * 60));

            clockDisplay.innerText = `Quedan ${hours} horas, ${minutes} minutos y ${seconds} segundos`;
        }

        updateClock(); // Actualiza inicialmente

        setInterval(updateClock, 1000); // Actualiza cada segundo
    </script>

</x-fast-view>

</x-app-layout > 
