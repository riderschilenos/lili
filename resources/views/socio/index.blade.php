<x-app-layout>
    <div class="container py-8">

        <div class="card">
            <div class="card-body">
                

                <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
               
                    <div>

                    </div>
                    <div>
                        <h1 class="text-2xl font-bold pb-4 text-center">CLUB RIDERS CHILENOS</h1>
                        
                    </div>
                    <div class="flex justify-end">
                        
                        <a href="{{route('socio.create')}}">
                            <button class="btn btn-danger w-full max-w-xs items-center justify-items-center">Mi Perfil RIDER</button>
                        </a>

                    </div>
                </div>

        

                @livewire('socio.socio-search')
                
            </div>
        </div>

    </div>
    

    {{-- @livewire('vendedor.pedidos-index')--}}
    
    
</x-app-layout>