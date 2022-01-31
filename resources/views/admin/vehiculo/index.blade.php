@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.vehiculo.create')}}">Nueva Vehiculo</a>
    <h1>Lista de Vehiculos</h1>
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
                        <th>Tipo de Vehiculo</th>
                        <th>Estado</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Usuario</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td>
                                {{$vehiculo->id}}
                            </td>
                            <td>
                                {{$vehiculo->vehiculo_type->name}}
                            </td>
                            <td>
                                
                                @switch($vehiculo->status)
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Borrador
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pre-Inscripción
                                            </span>
                                            @break
                                        @case(3)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado Ok
                                            </span>
                                            @break
                                        @case(4)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Publicado Pendiente
                                          </span>
                                          @break
                                        @case(5)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Registrado
                                          </span>
                                          @break
                                        @case(6)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Registrado-Venta
                                          </span>
                                          @break
                                          
                                      @default
                                          
                                    @endswitch
                            </td>
                            <td>
                                {{$vehiculo->marca->name}}
                            </td>
                            <td>
                                {{$vehiculo->modelo}}
                            </td>
                            <td>
                                {{$vehiculo->año}}
                            </td>
                            <td>
                                {{$vehiculo->user->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.vehiculo.edit',$vehiculo)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.vehiculo.destroy',$vehiculo)}}" method="POST">
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