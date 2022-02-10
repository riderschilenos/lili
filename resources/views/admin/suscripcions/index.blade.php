@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.suscripcions.create')}}">Nueva Suscripción</a>
    <h1>Suscripciones <H5>(SOCIO-INSCRIPCION)</H5></h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <th>Usuario</th>   
                        <th>Vencimiento</th>   
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscripcions as $suscripcion)
                        <tr>
                            <td>
                                {{$suscripcion->id}}
                            </td>
                            <td>
                                {{$suscripcion->precio}}
                            </td>
                            
                            <td>
                                {{$suscripcion->type}}
                            </td>
                            <td>
                                {{$suscripcion->suscripcionable_id}}
                            </td>
                            <td>
                                {{$suscripcion->end_date}}
                            </td>
                            
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.disciplinas.edit',$suscripcion)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.disciplinas.destroy',$suscripcion)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop