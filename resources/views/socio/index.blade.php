<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
    
        <div class="max-w-7xl mx-auto py-8">

            <div class="card">
                
                    

                    <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
                
                        <div>

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
                                            <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Mi Perfil</button>
                                        </a>
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center ml-2">Mi Perfil</button>
                                        </a>
                                    @else
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                    </a>
                                @endif     
                                

                            </div>
                        </div>
                    </div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8 mb-6 mt-2">
                        <article>
                            <figure>
                                <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/registroriders.png')}}" alt=""></a>
                            </figure>
        
                        
                        </article>

                    
                    </div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-8">
                        <article>
                            <figure>
                                <a href="{{route('socio.index')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/RIDERS-min.png')}}" alt=""></a>
                            </figure>
        
                        
                        </article>
                        <article>
                            <figure>
                                <a href="{{route('garage.vehiculos.registerindex')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO2-min.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <a href="{{route('garage.usados')}}"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS2-min.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                        
                    
                    </div>

                    @livewire('socio.socio-search')
                    
                
            </div>

        </div>  

    </x-fast-view>

</x-app-layout>