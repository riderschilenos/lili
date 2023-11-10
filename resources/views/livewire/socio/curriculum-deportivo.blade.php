<div>
    
           
<style>
    .slider::-webkit-scrollbar {
  display: none;
}
</style>

    <div class="max-w-5xl mx-auto">
        @php
            $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        @endphp

        <ol class="border-l border-gray-200 dark:border-gray-700">
            @if ($resultados->count()>0)
                @foreach ($resultados as $resultado)
                    
                        <li class="bg-gray-100 rounded-lg px-2 py-1 my-2 mx-1 shadow-lg" x-data="{slr: false}">
                            <div x-show="slr">
                                <ul class="slider snap-mandatory flex overflow-x-auto gap-0 snap-x before:shrink-0 before:w-[30vw] after:shrink-0 after:w-[30vw]" style='z-index: 1 ; ' x-on:click="slr=!slr">
                                    @if ($resultado->image)
                                    @php
                                        $n=1;
                                    @endphp
                                        @foreach ($resultado->image as $image)
                                            <li class="shrink-0 snap-center w-full snap-mandatory">       
                                                <img class="" src="{{Storage::url($image->url)}}" alt="" style="scroll-snap-align: center;">
                                                <p class="text-center">({{$n.'/'.$resultado->image->count()}})</p>
                                            </li>
                                            @php
                                                $n+=1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <li class="shrink-0 snap-center w-full snap-mandatory">       
                                            <img class="" src="{{asset('img/copa.png')}}" alt="" style="scroll-snap-align: center;">
                                        </li>
                                    @endif
                                    
                                                        
                                </ul>
                            </div>
                            <div class="flex justify-start  rounded-lg p-1 items-center" x-on:click="slr=!slr">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mb-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                      </svg>
                                      
                                      {{$resultado->titulo}}</h3>
                               
                            </div>
                            <article class="grid grid-cols-6" >
                            
                                <div class="col-span-2 items-center content-center my-auto">
                                 
                                      
                                                            @if($resultado->image->first())
                                                            
                                                                <img class="w-full h-32 object-contain content-center items-center " src=" {{Storage::url($resultado->image->first()->url)}}" alt="" x-on:click="slr=!slr">
                                                            @else
                                                                <img class="w-full h-32 object-contain content-center items-center " src="{{asset('img/copa.png')}}" alt="" x-on:click="slr=!slr">
                                                             
                                                            @endif    
                                                            
                                                       
                                              
                                     
                                </div>
                                <div class="px-2 py-2 col-span-4 ">
                                    <div class="flex justify-start ">
                                        <div class="items-center my-2">
                                            <div x-on:click="slr=!slr">
                                                <p class="text-gray-500 text-base font-bold cursor-pointer">{{$resultado->descripcion}}</p>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                
                            
                            </article>
                            <article class="grid grid-cols-6">
                            
                                <div class="col-span-2 items-center content-center my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">
                                 
                                      
                                                            @if($resultado->image->first())
                                                            
                                                                <p class="text-center">({{'1/'.$resultado->image->count()}})</p>
                                                            @else
                                                               <p class="text-center">({{'0/0'}})</p>
                                                             
                                                            @endif    
                                                            
                                                       
                                              
                                     
                                </div>
                                <div class="px-2 col-span-4 ">
                                    
                                    <div class="flex justify-end  rounded-lg px-1 items-center">
                                        @can('perfil_propio', $resultado->user->socio)
                                        <time class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">
                                    
                                            {{$meses[date('n', strtotime($resultado->fecha))-1]}}
                                            {{date('Y', strtotime($resultado->fecha))}}
                                    
                                        </time>
                                        -
                                        <a href="{{route('socio.resultados.edit',$resultado)}}" class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">editar</a>
                                        @else
                                            <time class="my-auto text-sm font-normal leading-none text-gray-400 dark:text-gray-500 ml-2">
                                    
                                                {{$meses[date('n', strtotime($resultado->fecha))-1]}}
                                                {{date('Y', strtotime($resultado->fecha))}}
                                        
                                            </time>
                                        @endcan
                                    </div>
                                
                                </div>
                                
                            
                            </article>
                        

                        </li>

                @endforeach
            @else 
                @can('perfil_propio', $socio)
                    <a href="{{route('socio.resultados.create')}}">
                        <div class="max-w-3xl flex justify-center mb-6 mt-4">
                            <div class="flex justify-between py-6 px-4 bg-gray-200 rounded-lg mx-2">
                                <div class="flex items-center space-x-4">
                                    <img src="{{asset('img/copa.png')}}" class="h-14 w-14" alt="">
                                    <div class="flex flex-col space-y-1">
                                    
                                            <span class="font-bold">Registra tu Curriculum Deportivo</span>
                                            <span class="text-sm text-center">de forma Online 🔥</span>
                                    
                                        
                                            
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </a>
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
                  
                @endcan
            @endif
               
           
          
           
        </ol>
        @can('Super admin')
            
            <div class="flex justify-end mt-4"> 
                <a href="#"
                class=" inline-flex justify-end ml-auto items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <p class="whitespace-nowrap "> Ver todo </p>
                
            
            </a>
            </div>
            
        @endcan
      
    
    </div>
</div>
