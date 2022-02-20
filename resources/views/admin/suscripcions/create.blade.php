@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Agregar nueva suscripcion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.suscripcion.sociostore',$socio]]) !!}
                @csrf
                
                <div class="form-group">
                    {!! Form::label('time', 'Socio:') !!}

                        {{$socio->name.' '.$socio->last_name}}

                        <p class="text-bold">Duración:</p>
                        <div class="form-group flex justify-center">
                            <div class="form-check">
                              <input type="radio" name="time" id="propio" value="1">
                              <label for="propio">
                               1 Año
                              </label>
                            </div>
                            <div class="form-check">
                              <input type="radio" name="time" id="propio" value="2">
                              <label for="propio">
                                2 Años
                              </label>
                            </div>
                            


                        </div>
                

                    

                </div>
                {!! Form::submit('Agregar suscripción', ['class'=>'btn btn-primary']) !!}
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