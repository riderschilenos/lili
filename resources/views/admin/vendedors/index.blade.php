@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1 class="text-center">RIDERS CHILENOS</h1>
@stop

@section('content')
   

@if ($vendedors->count())
            
      
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fono</th>
            <th>Estado</th>
            <th>Suscripción</th>
            <th></th>

        </thead>
        
        <tbody>
            @foreach ($vendedors->reverse() as $socio)
                <tr>
                    <td>{{$socio->id}}</td>
                    <td>{{$socio->user->name}}</td>
                    <td>{{$socio->user->email}}</td>
                    <td>
                        @if ($socio->fono)
                            {{$socio->fono}}
                        @endif</td>
                    <td>
                        @if($socio->estado==1)
                        ACTIVO
                        @else
                         INACTIVO
                        @endif
                    
                    </td>
                    <td width="120px">
                        @if($socio->estado==2)
                        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.suscripcion.sociocreate',$socio)}}">Suscripción</a>
                        @else
                           
                            <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.suscripcion.sociocreate',$socio)}}">Suscripción</a> 
                            
                            
                        
                        @endif
                    </td>
                    <td width="10px">
                        <a class="btn btn-primary" href="{{route('socio.show', $socio)}}">Ver Perfil</a>
                    </td>
                </tr>
                
            @endforeach

        </tbody>
    </table>
</div>


@else
<div class="card-body">
    <strong>No hay registros que coincidan</strong>
</div>


@endif
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop