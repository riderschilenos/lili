<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="card pb-8">
            <div class="card-body">
                

                <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
               
                    <div>

                    </div>
                    <div>
                        <h1 class="text-2xl font-bold pb-4 text-center">Vendedores Riders Chilenos</h1>
                        
                    </div>
                   
                </div>

                
                <div>
                    {!! Form::open(['route'=>'socio.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                
                    @csrf
                        
                    <div class="max-w-full items-center">
                        @include('socio.partials.form')
                    </div>
                    {!! Form::hidden('user_id',auth()->user()->id) !!}
                    @error('user_id')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                       {{-- comment
                    <div class="flex justify-center">
                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    </div>
                 --}}
                {!! Form::close() !!}
                </div>

                
                
            </div>
        </div>

    </div>

</x-app-layout>