<div>
        @if ($socio)

        <div class="mx-auto px-4 sm:px-2 lg:px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-2 gap-y-8">
            <div class="md: col-span-1 lg:col-span-2">

                <div class="flex justify-center mt-4">
                    <div class="max-w-sm ">

                        <x-socio-card :socio="$socio" />

                    </div>
                </div>
            </div>

            <div class="md: col-span-2 lg:col-span-3">
                @if (!is_null($socio->direccion))
                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg">
                            <h1 class="font-bold text-lg text-gray-800">Direccion</h1>
                        </header>
                        <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-0 shadow-lg rounded-b-lg">
                            

                            <div>
                                <p class="font-bold mr-2s">Comuna: </p>{{$socio->direccion->comuna}}{{$socio->direccion->id}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Calle: </p>{{$socio->direccion->calle}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Nro: </p>{{$socio->direccion->numero}}
                            </div>
                            <div>
                                <p class="font-bold mr-2">{{$socio->direccion->region}}</p>
                            </div>

                            <div>

                            </div>    
                        </div>
                    

                    
                    
                    
                @else

                    <div name="formulariodireccioninvitados">
                        <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una direccion de despacho para recibir tu credencial Física</h1>

                        
                        {!! Form::open(['route' => 'vendedor.direccions.store']) !!}

                        {!! Form::hidden('pedido_id', 'suscripcion' ) !!}
                
                        {!! Form::hidden('direccionable_id', $socio->id ) !!}

                        {!! Form::hidden('direccionable_type','App\Models\Socio') !!}
                        
                        @include('vendedor.pedidos.partials.formdirection')
                
                
                        <div class="flex justify-end">
                            <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                            {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                        </div>
                
                        {!! Form::close() !!}
                    </div>



                @endif
            </div>
        
        @else
            {!! Form::open(['route'=>'socio.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                
                @csrf
                    
                <div class="max-w-full items-center">
                    @include('socio.partials.form')
                </div>
                {!! Form::hidden('user_id',auth()->user()->id) !!}
                @error('user_id')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
                   
                <div class="flex justify-center">
                    {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>

            {!! Form::close() !!}
        @endif
</div>
