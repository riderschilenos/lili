@props(['vehiculo'])

<article class=" grid grid-cols-6 shadow-lg rounded-lg bg-main-color">
                            
    <div class="col-span-2 items-center content-center my-auto px-1 py-1">
     
          
           
                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                            @if($vehiculo->image->first())
                                
                                    <img class="w-full h-32 object-cover content-center items-center " src=" {{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                @else
                                    <img class="w-full h-32 object-cover content-center items-center " src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                            
                                 
                                @endif    
                                
                            </a>
                  
         
    </div>
        <div class="px-2 py-2 col-span-4 bg-white">
            <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                        <p class="text-gray-500 text-base font-bold mt-auto">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</p> 
                        <p class="text-gray-500 text-sm">Dueño:  
                            @if ($vehiculo->user->socio)
                                {{ $vehiculo->user->socio->name.' '.$vehiculo->user->socio->last_name}}
                            @else
                                {{ $vehiculo->user->name}}
                            @endif
                        </p>
                     
                        <p class="text-gray-500 text-sm mb-2">Año:  
                            @if ($vehiculo->año)
                                {{$vehiculo->año}}
                            @endif
                        </p>
                     

                        </a>

                       
            
                   
                       
                             
                                    
                                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="btn bg-gray-300 btn-block">
                                       Ver Ficha
                                    </a>

                     
                          



                
        </div>

</article>