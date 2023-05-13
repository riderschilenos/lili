<div>
@php
    $total=0;
    $pendientes=1000;
    $retiroacumulado=0;
    
@endphp

    @foreach ($tickets as $ticket)
        @if($ticket->status>=3)
            @php
                $total+=$ticket->inscripcion;
            @endphp
        @endif   
    @endforeach

    @foreach ($retiros as $retiro)
        @php
            $retiroacumulado+=$retiro->cantidad;
        @endphp
    @endforeach

    
    <div class="bg-white shadow mt-2 sm:mt-4 mb-4 w-full grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 gap-x-2 gap-y-2 items-center content-center">
    

       
            <div class="max-w-xl  bg-gray-100 shadow rounded-lg p-4 sm:p-6 xl:p-8 my-4 mx-4">
                <a href="{{route('organizador.eventos.inscritos.fast',$pista)}}" class="col-span-1">
                    <div class="flex justify-center">
                            @isset($pista->image)
                                <img class="h-16 w-16 mb-4" src=" {{Storage::url($pista->image->url)}}" alt="">
                            @else
                                <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                
                            @endisset
                        </div>
                    <div class="flex items-center">

                        <div class="flex-shrink-0">
                        
                       <div class="flex justify-center">
                            <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900 text-center">
                                {{number_format($inscripciones->count())}} / {{number_format($inscripciones->where('estado','>=',4)->count())}}
                            </span>
                        </div>
                            <h3 class="sm:hidden text-base font-normal text-gray-500">Vendidas/<br>Cobradas<br>/Mes</h3>
                            <h3 class="hidden sm:block text-base font-normal text-gray-500">Vendidas/Cobradas/Mes</h3>
                        </div>
                        <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                            
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                       <div class="flex justify-center">
                            <a href="{{route('ticket.pista.show', $pista)}}">
                                <button class="sm:hidden btn btn-danger ml-2 text-center text-xl mt-4 whitespace-nowrap">Link</button>
                                <button class="hidden sm:block btn btn-danger ml-2 text-center text-xl mt-4 whitespace-nowrap">Link-Pista</button>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
      

      
        
        <div class="col-span-2 rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1" class="col-span-2">
            <h1 class="text-center mb-6 "> Administracion Pista <b>{{$pista->titulo}}</b></h1>
            <a href="{{route('organizador.eventos.retiros.fast',$pista)}}" >
                <div class="flex items-center">

                    <div class="grid grid-cols-2 w-full ">
                        <div class="mr-2">
                            <span class="text-4xl sm:text-8xl text-center leading-none font-bold text-gray-900">${{number_format($total-$total*0.072-$retiroacumulado)}}</span>
                            <h3 class="sm:hidden text-base font-normal text-gray-500">Pend. Cobrar</h3>
                            <h3 class="hidden sm:block text-base font-normal text-gray-500">Pendiente Cobrar</h3>
                        </div>
                        <div  class="ml-2">
                            <span class="text-4xl sm:text-8xl text-center leading-none font-bold text-gray-900">${{number_format($retiroacumulado)}}</span>
                            <h3 class="sm:hidden text-base font-normal text-gray-500">Cobradas</h3>
                            <h3 class="hidden sm:block text-base font-normal text-gray-500">Cobradas</h3>
                        </div>
                    </div>
                
                    <div class="hidden sm:flex ml-5 w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                        
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                
            
                </div>
            </a>
            <div class="flex justify-center"> 
                <a href="{{route('organizador.eventos.fechas.fast',$pista)}}">
                    <button class="btn btn-danger ml-2 text-center text-xl mt-4">Entrenamientos</button>
                </a>
            </div>
        </div>
        

    </div>

    
</div>
