<x-app-layout>
    <div class="container py-8">

        <div class="card">
            <div class="card-body">
                

                <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
               
                    <div>

                    </div>
                    <div>
                        <h1 class="text-2xl font-bold pb-4 text-center">Inscripción Club Riders Chilenos</h1>
                        
                    </div>
                   
                </div>

                {!! Form::open(['route'=>'filmmaker.series.store','files'=>true , 'autocomplete'=>'off']) !!}
                    

                    <div class="card-body max-w-5xl items-center">
                        @include('socio.partials.form')
                    </div>
                    <div class="flex justify-end">
                        {!! Form::submit('Crear nueva serie', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
                
            </div>
        </div>

    </div>
    

    {{-- @livewire('vendedor.pedidos-index')--}}
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
    </x-slot>
    
    
</x-app-layout>