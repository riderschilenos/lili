@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Agregar nueva suscripcion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.marcas.store']) !!}
                @csrf
                
                <div class="form-group">
                    {!! Form::label('type', 'Tipo:') !!}

                        <div class="form-group flex justify-center">
                            <div class="form-check">
                              <input type="radio" name="type" id="propio" value="socio">
                              <label for="propio">
                               Suscripción Club RCH
                              </label>
                            </div>
                            <div class="form-check">
                              <input type="radio" name="type" id="propio" value="inscripcion">
                              <label for="propio">
                                Inscripción Vehiculo
                              </label>
                            </div>
                            


                        </div>
                    <div class="mb-4">
                        {!! Form::label('user_id', 'Usuario:') !!}
                        {!! Form::select('user_id', $users, null , ['class'=>'form-input block w-full mt-1']) !!}
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                    <div class="mb-4">
                        {!! Form::label('end_date', 'Vencimiento:') !!}
                        {!! Form::date('born_date', null , ['class' => 'form-input block w-full mt-1'.($errors->has('end_date')?' border-red-600':''),'autocomplete'=>"off"]) !!}

                        @error('end_date')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                </div>
                {!! Form::submit('Agregar suscripcion', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop