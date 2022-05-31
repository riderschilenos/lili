<x-app-layout>

    <div>

        <div :class="{'block': home, 'hidden': ! home}">
            
            <section class="bg-cover bg-center" style="background-image: url({{asset('img/home/homefotomini.png')}})">

                <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 pt-64 pb-8">
                    
                        <h1 class="text-white font-fold text-4xl text-center">RidersChilenos</h1>
                        <p class="text-white text-lg mt-2 mb-4 text-center">Bienvenido al Portal Rider Más Grande del País</p>
                            <!-- component -->
                            <!-- This is an example component -->
                    
                        
                    
                </div>

            </section>

            <section class="mt-16">
                

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                    <article>
                        <figure>
                            <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home4.jpeg')}}" alt=""></a>
                        </figure>

                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS.png')}}" alt=""></a>
                        </figure>
                    
                    </article>
                    <article>
                        <figure>
                            <a href="{{route('series.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home3.jpeg')}}" alt=""></a>
                        </figure>
                        
                    </article>
                
                </div>

            </section>
            
            <section class="mt-16 bg-gray-700 py-12">
                <h1 class="text-center text-white text-3xl">Ultimos Riders Registrados</h1>
                <p class="text-center text-white pb-6">Unete a la comunidad rider más grande del país</p>
                

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                    @foreach ($socios as $socio)

                        <x-socio-card :socio="$socio" />
                        
                    @endforeach

                </div>

                <div class="flex justify-center mt-4 pt-4">
                    <a href="{{route('socio.create')}}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">
                        Obtener Suscripción
                    </a>
                </div>
                <div class="flex justify-center mt-2 pt-2">
                    <a href="{{route('socio.index')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                        Ver Todos
                    </a>
                </div>
            
            </section>

            <section class="my-4  py-12">
                <h1 class="text-center text-3xl text-gray-600 font-bold">Compra y Venta Rider</h1>
                <p class="text-center text-gray-500 text-sm mb-6">Bicicletas, Motos y Otros.</p>
                
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">

                    @foreach ($vehiculos as $vehiculo)

                        <x-vehiculo-card :vehiculo="$vehiculo" />
                        
                    @endforeach

                </div>

                <div class="flex justify-center mt-4 pt-4">
                    <div class="grid grid-cols-2 gap-2">
                    <a href="{{route('garage.vehiculo.vender')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                        Publicar
                    </a>
                    <a href="{{route('garage.usados')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                        Ver todos
                    </a>

                    </div>
            
            </section>

            <section class="my-4  py-12">
                <h1 class="text-center text-3xl text-gray-600">Ultimos Videos y Carreras</h1>
                <p class="text-center text-gray-500 text-sm mb-6">Compra y apoya las producciones nacionales</p>
                
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                    @foreach ($series as $serie)

                        <x-serie-card :serie="$serie" />
                        
                    @endforeach

                </div>
            
            </section>
        </div>

        <div :class="{'block': socio, 'hidden': ! socio}">
            
            <div class="container py-8">

                <div class="card">
                    
                        
        
                        <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
                       
                            <div>
        
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold pb-4 text-center">CLUB RIDERS CHILENOS</h1>
                                
                            </div>
                            <div class="hidden sm:block">
                                <div class="flex justify-end mr-4 ">
        
                                    
                                        @if(auth()->user())
                                            @if(auth()->user()->socio)
                                                <div class="grid grid-cols-2 gap-2">
                                                <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                                    <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                                </a>
                                                <a href="{{route('socio.create')}}">
                                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Mi Suscripción</button>
                                                </a>
                                                </div>
                                            @else
                                                <a href="{{route('socio.create')}}">
                                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                            </a>
                                        @endif    
                                    
        
                                </div>
                            </div>
                            <div class="block sm:hidden">
                                <div class="flex justify-center ">
        
                                    
                                        @if(auth()->user())
                                            @if(auth()->user()->socio)
                                                <a href="{{ route('socio.show', auth()->user()->socio)}}">
                                                    <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                                </a>
                                                <a href="{{route('socio.create')}}">
                                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center ml-2">Mi Suscripción</button>
                                                </a>
                                            @else
                                                <a href="{{route('socio.create')}}">
                                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                                            </a>
                                        @endif    
                                    
        
                                </div>
                            </div>
                        </div>
        
                
        
                        @livewire('socio.socio-search')
                        
                    
                </div>
        
            </div>  

        </div>

        <div :class="{'block': registro, 'hidden': ! registro}">
            
            <div class="container py-8 ">
        
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-2xl font-bold text-center">Registro RCH</h1>
                        
                                <div class="mx-auto flex justify-center mt-4">
                                                
                                    <a href="{{route('garage.vehiculo.create')}}">
                                        <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                                        
                                            Inscribe tu Juguete
        
                                        </button>
                                    </a>
                                </div>
                        
                       
                        <hr class="mt-2 mb-6">
        
                            
                            
                        @livewire('vehiculo.vehiculo-search')
                       
                    </div>
                </div>
        
            </div>

        </div>


    </div>


</x-app-layout>

