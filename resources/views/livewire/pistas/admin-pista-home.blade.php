<div>
@foreach ($pistas as $pista)
    
    <div class="mt-2 sm:mt-4 mb-4 w-full grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 gap-x-2 gap-y-2 items-center content-center">
    

        <a href="{{route('organizador.eventos.inscritos.fast',$pista)}}">
        <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                   
                    @isset($pista->image)
                        <img class="h-10 w-10 rounded-full mb-4" src=" {{Storage::url($pista->image->url)}}" alt="">
                    @else
                        <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
        
                   @endisset
                   <span class="text-4xl sm:text-8xl leading-none text ml-4 font-bold text-gray-900">{{number_format($despacho->count())}}</span>
                    <h3 class="sm:hidden text-base font-normal text-gray-500">Entradas Comp./Mes</h3>
                    <h3 class="hidden sm:block text-base font-normal text-gray-500">Entradas Compradas/Mes</h3>
                </div>
                <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                    
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        </a>

      
        <a href="{{route('organizador.eventos.retiros.fast',$pista)}}" class="col-span-2">
        <div class="col-span-2 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-1">
            <h1 class="text-center mb-6 "> Administracion Pista <b>{{$pista->titulo}}</b></h1>
            <div class="flex items-center">
                <div class="grid grid-cols-2 w-full">
                    <div >
                        <span class="text-4xl sm:text-8xl text-center leading-none font-bold text-gray-900">{{number_format($despacho->count())}}</span>
                        <h3 class="sm:hidden text-base font-normal text-gray-500">Pend. Cobrar</h3>
                        <h3 class="hidden sm:block text-base font-normal text-gray-500">Pendiente Cobrar</h3>
                    </div>
                    <div >
                        <span class="text-4xl sm:text-8xl text-center leading-none font-bold text-gray-900">{{number_format($despacho->count())}}</span>
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
        </div>
        </a>

    </div>
@endforeach
    
</div>
