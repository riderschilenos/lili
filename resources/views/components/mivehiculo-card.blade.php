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
                                @if($vehiculo->image->first())
                                <img class="h-46 w-full object-cover" src=" {{$vehiculo->image->first()->url}}" alt="">
                                @else
                                <img class="h-44 w-full object-cover" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                                @endif
                            </a>
                        </div>
                        

                        
                    </div>

                    @if($vehiculo->status==1)
                        @if($vehiculo->image->first())
                            <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                            Continuar Editando
                            </a>
                        @else
                            <a href= "{{route('garage.image', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                Continuar Editando
                            </a>
                        @endif
                    @else
                        <div class="grid grid-cols-2">
                            <div>
                                <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                    Ver Publicacion
                                </a>
                            </div>
                            <div>
                                <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                    Bajar Publicacion
                                </a>
                            </div>
                        </div>
                    @endif
               </div>
            </article>