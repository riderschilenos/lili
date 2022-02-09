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
                    <div class="mb-4">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la marca']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('user_id', 'Usuario:') !!}
                        {!! Form::select('user_id', $users, null , ['class'=>'form-input block w-full mt-1']) !!}
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

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