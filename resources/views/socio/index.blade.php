<x-app-layout>
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

                            <a href="{{route('socio.create')}}">
                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                            </a>

                        </div>
                    </div>
                    <div class="block sm:hidden">
                        <div class="flex justify-center ">

                            <a href="{{route('socio.create')}}">
                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Obtener Suscripción</button>
                            </a>

                        </div>
                    </div>
                </div>

        

                @livewire('socio.socio-search')
                
            
        </div>

    </div>
    

    {{-- @livewire('vendedor.pedidos-index')--}}
    
    
</x-app-layout>