@props(['vehiculo'])

<article class="card">
               
               <div class="card-body">
                   <div class="grid grid-cols-2">
                   <h1 class="card-tittle">{{$vehiculo->marca.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                   <h1 class="ml-auto card-tittle mr-2 mt-2">${{number_format($vehiculo->precio, 0, '.', '.')}}-.</h1>
                    </div>
                    <p class="text-gray-500 text-sm mb-2">Vendedor: {{$vehiculo->user->name}}</p>
                    <div class="grid grid-cols-5">
                        <div class="col-span-3">
                            
                            <img class="h-72 w-full object-cover" src=" {{Storage::url($vehiculo->image->first()->url)}}" alt="">
                        </div>
                        <div class="col-span-2 ml-2 mt-2">

                            <p class="text-gray-500 text-sm ">Tipo:</p> 
                            <p class="text-gray-500 text-lg mb-2 ">{{$vehiculo->vehiculo_type->name}}</p> 

                            <p class="text-gray-500 text-sm">Año:</p>
                            <p class="text-gray-500 text-lg mb-2">{{$vehiculo->año}}</p>

                            <p class="text-gray-500 text-sm">Cilindrada:</p>
                            <p class="text-gray-500 text-sm mb-2">{{$vehiculo->cilindrada}} <b>cc</b></p>

                            <div class="flex mt-24">
                                
                                <p class="text-sm text-gray-500 ml-auto flex justify-end"> 
                                    <i class="fas fa-users"></i>
                                    (1000)
                                </p>
                            </div>

                        </div> 

                        
                    </div>

                    
                    
                    <a href= "{{route('usados.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger btn-block">
                        Ver Más Información
                    </a>
                    
               </div>
            </article>