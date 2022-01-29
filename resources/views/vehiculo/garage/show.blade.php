<x-app-layout>

     <section class="bg-gray-700 py-12 mb-8 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>

                @if($vehiculo->image->first())
                
                    <img class="h-80 w-full object-cover object-center" src="{{$vehiculo->image->first()->url}}" alt="">
                @else
                    <img class="h-60 w-full object-cover object-center" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                
                @endif
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                <h2 class="text xl mb-3">Vendedor: {{$vehiculo->user->name}}</h2>
                <p class="mb-2"><i class="fas fa-wrench"></i> <b>3</b> Mantenciones registradas</p>
                <p class="mb-2"><i class="fas fa-biking"></i> Tipo de vehiculo: {{$vehiculo->vehiculo_type->name}}</p>
                <p class="mb-2"><i class="fas fa-clock"></i> Año: {{$vehiculo->año}}</p>
                <p class="mb-2"><i class="fas fa-adjust"></i> Aro: </p>
                <p class="mb-2"><i class="fas fa-star"></i> Ofertas: 40</p>

            </div>

        </div>

    </section>


    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card">
                <div class="card-body">
                    <div class="grid grid-cols-2">
                    
                        <div>
                            <h1 class="font-bold text-2xl mb-2 text-gray-800 items-center">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                            
                            
                        </div>
                        <div>
                            <img class="h-14 w-20 object-contain object-center ml-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Honda_Logo.svg/2552px-Honda_Logo.svg.png" alt="">
                
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
                                    <div class="px-4 py-2 font-semibold">cilindrada</div>
                                    <div class="px-4 py-2">{{ $vehiculo->cilindrada}}</div>
                                </div>
                            @endif
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Año:</div>
                                <div class="px-4 py-2">{{ $vehiculo->año}}</div>
                            </div>
                            
                        </div>
                    </div>
                    

                    
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


        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  />
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Vendedor: {{ $vehiculo->user->name }}</h1>
                            @if($vehiculo->user->socio)
                                <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $vehiculo->user->socio)}}">{{'@'.$vehiculo->user->socio->slug}}</a>

                            @endif
                        </div>
                    </div>
                    
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