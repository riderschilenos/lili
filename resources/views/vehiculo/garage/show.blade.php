<x-app-layout>

     <section class="bg-gray-700 py-12 mb-8 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>

                @if($vehiculo->image->first())
                
                    <img class="h-80 w-full object-cover object-center" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                    <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-8">

                        @foreach ($vehiculo->image as $image)
            
                            <img class="h-24 w-full object-contain object-center" src="{{Storage::url($image->url)}}" alt="">
                    
                            
                        @endforeach
            
                    </div>
                @else
                    <img class="h-60 w-full object-cover object-center" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                
                @endif
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                @if($vehiculo->ubicacion)
                    <h2 class="text xl mb-3">Ubicación: {{$vehiculo->ubicacion}}</h2>
                @endif
                {{-- comment
                
                <p class="mb-2"><i class="fas fa-wrench"></i> <b>3</b> Mantenciones registradas</p>
                 --}}
                <p class="mb-2"><i class="fas fa-biking"></i> Tipo de vehiculo: {{$vehiculo->vehiculo_type->name}}</p>
                <p class="mb-2"><i class="fas fa-clock"></i> Año: {{$vehiculo->año}}</p>
                @if ($vehiculo->precio)
                    <p class="my-2 text-2xl"><i class="fas fa-dollar-sign"></i> Precio: ${{number_format($vehiculo->precio, 0, '.', '.')}}-.</p>
               
                @endif

                @if ($qr)
                    @if ($qr->value==5000)
                        <img class="h-24 w-16 object-contain object-center mt-24 ml-4" src="{{asset('img/home/qrsilver.png')}}" alt="">
                    @elseif($qr->value==10000)
                        <img class="h-24 w-16 object-contain object-center mt-24 ml-4" src="{{asset('img/home/qrgold.png')}}" alt="">
                    @endif
                    
                @endif
                {{-- comment
                <p class="mb-2"><i class="fas fa-adjust"></i> Aro: </p>
                <p class="mb-2"><i class="fas fa-star"></i> Ofertas: 40</p>
 --}}
            </div>

        </div>

    </section>


    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-1 lg:col-span-2 lg:order-1">
            <section class="card  mb-8">
                <div class="card-body">
                    <div class="grid grid-cols-2">
                    
                        <div>
                            <h1 class="font-bold text-2xl mb-2 text-gray-800 items-center">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                            
                            
                        </div>
                        <div>
                            @isset($vehiculo->marca->image)
                      
                  
                            
                                <img class="h-14 w-20 object-contain object-center ml-auto" src="{{Storage::url($vehiculo->marca->image->url)}}" alt="">
                  
                      
                            @endisset
                            
                
                        </div>
                        
                    </div>

                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-1 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Marca:</div>
                                <div class="px-4 py-2">{{ $vehiculo->marca->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Modelo:</div>
                                <div class="px-4 py-2">{{ $vehiculo->modelo}}</div>
                            </div>
                            @if($vehiculo->cilindrada)
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">cilindrada: </div>
                                    <div class="px-4 py-2">{{ $vehiculo->cilindrada}}</div>
                                </div>
                            @endif
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Año:</div>
                                <div class="px-4 py-2">{{ $vehiculo->año}}</div>
                            </div>
                            @if($vehiculo->nro_serie)
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nro Serie:</div>
                                    <div class="px-4 py-2">{{ $vehiculo->nro_serie}}</div>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    @if($vehiculo->descripcion)
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-1 text-sm">
                                <div class="px-4 py-2 font-semibold text-lg">Descripción:</div>
                                <div class="px-4 pb-2 text-lg">{!! $vehiculo->descripcion !!}</div>
                                
                            </div>
                        </div>
                    @endif
                    

                    
                </div>

            </section>

         
{{-- comment

            <section class="mb-8">
                

                <header class="border border-gray-200 px-4 py-2 cursor bg-gray-200 mt-6">
                    <h1 class="font-bold text-lg text-gray-800">Mantenciones</h1>
                </header>

                <div class="bg-white py-2 px-4">
                    <ul class="sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-4 gap-y-6 mt-8">
                        
                            <li><img class="flex ml-3 h-12 w-12 rounded-full object-cover" src="" alt=""  /></li>
                            
                    </ul>
                    
                </div>
            </section>

            
--}}
        


             @livewire('vehiculo.vehiculo-mantencion',['vehiculo' => $vehiculo])
 
            

        </div>


        <div class="order-2 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    @if($vehiculo->property==1)
                        <div class="flex items-center">
                            <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  />
                            <div class="ml-4">

                                
                                    <h1 class="font-fold text-gray-500 text-lg"> 

                                    @if($vehiculo->status==5)

                                        Dueño:
                                        
                                    @else
                                        Vendedor: 
                                    @endif
                                        
                                    
                                        {{ $vehiculo->user->name }}</h1>
                               

                                @if($vehiculo->user->socio)
                                    <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $vehiculo->user->socio)}}">{{'@'.$vehiculo->user->socio->slug}}</a>

                                @endif
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Vendedor:</div>
                            
                            <div class="px-4 py-2">{{ $vehiculo->nombre }}</div>
                        </div>
                    @endif

                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-1 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Ubicación:</div>
                                    @if($vehiculo->user->socio)
                                        
                                        <div class="px-4 py-2">{{$vehiculo->user->socio->direccion->comuna}}, {{$vehiculo->user->socio->direccion->region}}</div>
                                        
                                    @else
                                        <div class="px-4 py-2">{{ $vehiculo->ubicacion }}</div>
                                    @endif
                                
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Fono:</div>
                                    @if($vehiculo->user->socio)

                                        <div class="px-4 py-2">{{ $vehiculo->user->socio->fono}}</div>
                                    @else
                                        <div class="px-4 py-2">{{ $vehiculo->fono}}</div>
                                    @endif
                                
                            </div>
                            
                            <div class="grid grid-cols-2">
                                    @if($vehiculo->status==5)

                                    <div class="px-4 py-2 font-semibold">Fecha de inscripción</div>
                                    @else
                                        <div class="px-4 py-2 font-semibold">Fecha de publicación</div>
                                    @endif
                                
                                <div class="px-4 py-2">{{$vehiculo->created_at->format('d-m-Y')}}</div>
                             </div>
                            
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email:</div>
                                    @if($vehiculo->status==5)

                                    <div class="px-4 py-2">{{ $vehiculo->user->email}}</div>
                                    @else
                                        <div class="px-4 py-2">{{ $vehiculo->email}}</div>
                                    @endif
                                
                            </div>
                            
                        </div>
                    </div>

                    @if($vehiculo->property==2)
                        <hr class="w-full py-4">
                        <p class="text-sm text-center">Esta publicación fue realizada por un agende de ventas de RidersChilenos</p>

                        <div class="flex items-center mt-6">
                            @if($vehiculo->user->socio)
                            <a href="{{route('socio.show', $vehiculo->user->socio)}}"><img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  /></a>
                                
                            @else
                                <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  />
                            @endif
                            
                            <div class="ml-4">

                                
                                


                                @if($vehiculo->user->socio)
                                <a href="{{route('socio.show', $vehiculo->user->socio)}}"><h1 class="font-fold text-gray-500 text-lg">Agente: {{ $vehiculo->user->name }}</h1></a>
                                    <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $vehiculo->user->socio)}}">{{'@'.$vehiculo->user->socio->slug}}</a>
                                @else
                                    
                                <h1 class="font-fold text-gray-500 text-lg">Agente: {{ $vehiculo->user->name }}</h1>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                </div>
            </section>
 {{-- comment   
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover"src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('series.show', $similar)}}">{{Str::limit($similar->titulo, 40)}}</a>
                            </h1>

                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 rounded-full shadow-lg object-cover" src="{{$similar->productor->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->productor->name}}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

    </div>

    --}}

    
    

</x-app-layout>