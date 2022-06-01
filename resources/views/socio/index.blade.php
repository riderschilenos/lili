<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2">
    
        <div class="max-w-7xl mx-auto py-8">

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

    </x-fast-view>

</x-app-layout>