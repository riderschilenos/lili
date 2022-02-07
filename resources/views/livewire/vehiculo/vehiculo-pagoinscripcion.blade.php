<div>
    @if ($vehiculo->status==2)
        <h1 class="text-lg ml-2 font-bold">La inscripción del primer vehiculo es un gentil auspicio de RIDERS CHILENOS.</h1>


        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="flex justify-center mt-6">
                
                <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
            </div>
                
        <div class="card"><div class="card-body">
            <article class="flex items-center">
                @if (auth()->user()->socio->vehiculos->count()==1)

                
                   
                        <h1 class="text-lg ml-2 font-bold">Periodo de inscripcion:</h1>
                        <h1 class="text-lg ml-2"> 1 año</h1>
                        
                        

           
                        <p class="text-xl font-bold ml-auto">GRATIS</p>
            
                        
                
                    
                @else

                    PAGO
                    
                @endif
                    
                    
                
            </article>
            
            
            
        </div></div></div>

        </div>

        @if (auth()->user()->socio->vehiculos->count()==1)
                
            <div class="flex justify-center mt-2 mb-4">

                <form action="{{route('garage.inscribir',$vehiculo)}}" method="POST">
                    @csrf

                    <button class="btn btn-primary" type="submit">Inscribir</button>
                </form>   

            </div>
                    
        @endif

        

    @elseif($vehiculo->status==6||$vehiculo->status==6)

        Como mantener o eliminar la siscripcion

    @endif
</div>
