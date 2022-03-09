@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Crear nuevos productos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.disciplinas.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la disciplina']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                </div>
                <div class="mb-4">
                    {!! Form::label('precio', 'Precio:') !!}
                    {!! Form::number('precio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('precio')?' border-red-600':''),'step' => '0.5']) !!}

                    @error('precio')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    {!! Form::label('comision_invitado', 'Comision Invitado') !!}
                    {!! Form::number('comision_invitado', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_invitado')?' border-red-600':''),'step' => '0.5']) !!}

                    @error('comision_invitado')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    {!! Form::label('comision_socio', 'Comision Socio') !!}
                    {!! Form::number('comision_socio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comision_socio')?' border-red-600':''),'step' => '0.5']) !!}

                    @error('comision_socio')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                
                {!! Form::submit('Crear Disciplina', ['class'=>'btn btn-primary']) !!}
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