<div>
    <div class="max-w-5xl mx-auto">


        <ol class="border-l border-gray-200 dark:border-gray-700">
            @if ($resultados->count()>0)
                @foreach ($resultados as $resultado)
                        <li class="bg-gray-100 rounded-lg p-2 ml-2 mt-4 shadow-lg">
                            <div class="flex justify-between  rounded-lg p-1 items-center">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$resultado->titulo}}</h3>
                                <time class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">Febrero 2023</time>
                            </div>
                            <div class="flex items-center">
                                @if ($resultado->image->first())
                                    <img class="h-16 object-contain mr-4 cursor-pointer items-center" src="{{Storage::url($resultado->image->first()->url)}}" title="image" alt="">
                                @else
                                    <img class="h-16 object-contain mr-4 cursor-pointer items-center" src="{{asset('img/copa.png')}}" title="Descargar" alt="">
                                @endif
                                <div class="ml-2">
                                
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{$resultado->descripcion}}</p>
                                    
                                    
                                </div>
                              

                            </div>

                            <div class="flex justify-end  rounded-lg p-1 items-center">
                               @can('perfil_propio', $socio)
                                    <a href="{{route('socio.resultados.edit',$resultado)}}" class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">editar</a>
                                @endcan
                            </div>
                        </li>
                @endforeach
            @else
                <div class="max-w-3xl flex justify-center mb-6 mt-4">
                    <div class="flex justify-between py-6 px-4 bg-gray-200 rounded-lg mx-2">
                        <div class="flex items-center space-x-4">
                            <img src="{{asset('img/copa.png')}}" class="h-14 w-14" alt="">
                            <div class="flex flex-col space-y-1">
                                <span class="font-bold">Aun no Registra su Curriculum Deportivo</span>
                                <span class="text-sm text-center">Pronto nuevas novedades 🔥</span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            @endif
               
           
          
           
        </ol>
        <div class="flex justify-end mt-4"> 
            <a href="#"
            class=" inline-flex justify-end ml-auto items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
           <p class="whitespace-nowrap "> Ver todo </p>
            
           
        </a>
        </div>
      
    
    </div>
</div>
