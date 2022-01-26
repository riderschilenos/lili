@props(['vehiculo'])

<article class="card">
               
               <div class="card-body">
                    @if ($vehiculo->precio)

                        <div class="grid grid-cols-2">
                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                            <h1 class="text-md">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                        </a>
                    
                        <h1 class="ml-auto card-tittle mr-2 mt-2">${{number_format($vehiculo->precio, 0, '.', '.')}}-.</h1>
                        </div>
                    @else
                        <div class="grid grid-cols-1">
                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                            <h1 class="text-md">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                        </a>
                    
                        </div>
                    @endif
                    
                    
                    <div class="grid grid-cols-5">
                        <div class="col-span-5">
                            <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                <img class="h-46 w-full object-cover" src=" {{Storage::url($vehiculo->image->first()->url)}}" alt="">
                            </a>
                        </div>
                        

                        
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                Ver Publicacion
                            </a>
                        </div>
                        <div>
                            <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                Bajar Publicacion
                            </a>
                        </div>
                    </div>
               </div>
            </article>