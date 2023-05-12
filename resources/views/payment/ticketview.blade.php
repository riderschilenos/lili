 
<x-app-layout > 
 
  <div class="flex justify-center w-full bg-blue-900">

    <div class="rounded-lg mt-12 mb-28">
    
        <div class="z-10 bg-blue-900 rounded-lg pb-20">
          <div class="flex mb-24">
            <div class="bg-white w-full rounded-lg px-6 py-5">
  
              
                <div class="w-full mx-12">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center justify-between  my-1">
                      <span class="mr-3 rounded-full bg-white">
  
                      <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                      
                      </span>
                        <h2 class="text-xl mx-4">Entrada {{$evento->titulo}}</h2>
                      </div>
                     
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5"></div>
                    <div class="flex items-center">
                     
                      <div class="flex flex-col mx-auto">
                        <img src="{{Storage::url($ticket->qr)}}" width="150px" class=" p-1">
      
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
                        <div class="flex items-center mb-5 p-5 text-sm">
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
                                  <label class="mx-4"> {{$inscripcion->fecha->fecha}}</label>
                              @else
                                  <label class="mx-4"> {{$inscripcion->fecha->name}}</label>
                              @endif
                            </div>
          
                          </div>
                          <div class="flex flex-col ml-auto">
                           
                          
                            <div class="font-semibold text-center">
                              <a href="" class="btn btn-danger h-4 my-auto">
                              COBRAR
                              </a>
                            </div>
          
                          </div>
                        </div>
                      @endforeach
                    
                    <div class="border-b border-dashed border-b-2 my-5 pt-5">
                      <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                      <h1 class="text-xs text-center">Información del Rider</h1>
                    
                    </div>
                    <div class="flex items-center px-5 pt-3 text-sm">
                      <div class="flex flex-col">
                        <span class="">Nombre</span>
                        <div class="font-semibold">{{$ticket->user->name}}</div>
      
                      </div>
                     
                     
                     
                      @if($ticket->user->socio->direccion)
                          <div class="flex flex-col ml-6">
                            <span class="">Localidad</span>
                            <div class="font-semibold">{{Str::limit($ticket->user->socio->direccion->comuna.', '.$ticket->user->socio->direccion->region,20)}}</div>
          
                          </div>
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
  
</x-app-layout > 
