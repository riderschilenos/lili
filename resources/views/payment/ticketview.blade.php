 
<x-app-layout > 


  <x-slot name="tl">
            
    <title>Ticket Nro: {{$ticket->id}}</title>
</x-slot>

<x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
   
  @can('Super admin')
              
    <div class="flex justify-center my-2">
      {!! Form::open(['route'=>['whatsapp.resend.ticket',$ticket] , 'method'=>'Post']) !!}
                    
    
        
          
              {!! Form::submit('  Resend Ticket Whatsapp', ['class'=>'font-semibold rounded-xl bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded']) !!}
          
      {!! Form::close() !!}

    </div>

  @endcan
 

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style>
	.barcode {
		left: 50%;
		box-shadow: 1px 0 0 1px, 5px 0 0 1px, 10px 0 0 1px, 11px 0 0 1px, 15px 0 0 1px, 18px 0 0 1px, 22px 0 0 1px, 23px 0 0 1px, 26px 0 0 1px, 30px 0 0 1px, 35px 0 0 1px, 37px 0 0 1px, 41px 0 0 1px, 44px 0 0 1px, 47px 0 0 1px, 51px 0 0 1px, 56px 0 0 1px, 59px 0 0 1px, 64px 0 0 1px, 68px 0 0 1px, 72px 0 0 1px, 74px 0 0 1px, 77px 0 0 1px, 81px 0 0 1px, 85px 0 0 1px, 88px 0 0 1px, 92px 0 0 1px, 95px 0 0 1px, 96px 0 0 1px, 97px 0 0 1px, 101px 0 0 1px, 105px 0 0 1px, 109px 0 0 1px, 110px 0 0 1px, 113px 0 0 1px, 116px 0 0 1px, 120px 0 0 1px, 123px 0 0 1px, 127px 0 0 1px, 130px 0 0 1px, 131px 0 0 1px, 134px 0 0 1px, 135px 0 0 1px, 138px 0 0 1px, 141px 0 0 1px, 144px 0 0 1px, 147px 0 0 1px, 148px 0 0 1px, 151px 0 0 1px, 155px 0 0 1px, 158px 0 0 1px, 162px 0 0 1px, 165px 0 0 1px, 168px 0 0 1px, 173px 0 0 1px, 176px 0 0 1px, 177px 0 0 1px, 180px 0 0 1px;
		display: inline-block;
		transform: translateX(-90px);
	}
</style>

<div class="flex justify-center w-full bg-blue-900 pt-4 pb-12 px-2">
    <div class="max-w-md w-full h-full mx-auto z-10 bg-blue-800 rounded-3xl">
      <div class="flex flex-col">
        <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
          <div class="flex-none sm:flex">
            <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
              <img src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg" alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
              <a href="#"
                class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="h-4 w-4">
                  <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                  </path>
                </svg>
              </a>
            </div>
            <div class="flex-auto justify-evenly">
              <div class="flex items-center justify-between">
                <div class="flex items-center  my-1">
                  <span class="mr-3 rounded-full bg-white w-8 h-8">
                      <img src="{{asset('img/ticket.png')}}" class="h-8 p-1">
                  </span>
                  <h2 class="font-medium">
                    @if ($evento->type=='desafio')
                      {{$evento->titulo}}

                    @else
                      Entrada {{$evento->titulo}}
                    @endif
                  </h2>
                </div>
                <div class="ml-auto text-blue-800">Nro: {{$ticket->id}}</div>
              </div>
              <div class="border-b border-dashed border-b-2 my-5"></div>
                <div class="flex justify-center items-center">
                  @if ($evento->type=='desafio')
                            
                    @if ($ticket->user->AtletaStrava)
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
                <div class="border-b border-dashed border-b-2 my-5 pt-5">
                  <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                  <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                </div>
                @foreach ($ticket->inscripcions as $inscripcion)
                  <div class="px-5 bg-gray-100 shadow mb-4 py-2">
                    <div class="flex items-center ">
                      <div class="flex flex-col text-sm">
                        <span class="">
                          @if ($evento->type=='pista')
                              Cilindrada
                          @else
                              Categoria
                          @endif
                        </span>
                        <div class="font-semibold">
                          {{$inscripcion->fecha_categoria->categoria->name}}
                        </div>

                      </div>
                      <div class="flex flex-col mx-auto text-sm">
                        <span class="">
                          @if ($evento->type=='pista')
                              Fecha
                          @else
                              Fecha
                          @endif
                        </span>
                        <div class="font-semibold">
                          @if ($inscripcion->fecha->name=='keyname')
                              {{date('d/m/Y', strtotime($inscripcion->fecha->fecha))}}
                          @else
                              {{$inscripcion->fecha->name}}
                          @endif
                        </div>

                      </div>
                      <div class="flex flex-col text-sm">
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
                                      <div class="flex justify-center px-5 text-sm mt-2">
                                        <div class="font-semibold text-center">
                                            {!! Form::open(['route'=>['ticket.inscripcions.update',$inscripcion], 'method'=> 'PUT' ]) !!}
                                                @csrf
                                            {!! Form::submit('COBRAR', ['class'=>'font-semibold rounded bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 my-auto cursor-pointer']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                      </div>
                                      
                                  @endif
                                

                                @endif
                                  
                    @endif
                  </div>
                @endforeach
                <div class="border-b border-dashed border-b-2 my-5 pt-5">
                  <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                  <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                </div>
                <div class="flex justify-between items-center px-5 pt-3 text-sm">
                  <div class="flex flex-col">
                    <span class="">Nombre</span>
                        @if ($ticket->ticketable_type=='App\Models\Socio')
                          @if ($ticket->user->socio)
                           <div class="font-semibold">{{$ticket->user->socio->name}}</div>  
                          @else

                             <div class="font-semibold">{{$ticket->user->name}}</div>  
                          @endif
                             

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

                      
                          <div class="flex flex-col">
                            <span class="">Localidad</span>
                            <div class="font-semibold">{{Str::limit($ticket->user->socio->direccion->comuna.', '.$ticket->user->socio->direccion->region,20)}}</div>
          
                          </div>
                        @endif
                      @endif
                  @endif
                
                </div>
                <div class="flex flex-col py-5  justify-center text-sm ">
                  <h6 class="font-bold text-center">Ticket de Ingreso</h6>

                  <div class="barcode h-14 w-0 inline-block mt-4 relative left-auto"></div>
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
