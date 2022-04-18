@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>RidersChilenos</h1>
@stop

@section('content')
    
    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.products.create')}}">Nuevo Producto</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Comisión Invitado</th>
                        <th>Comisión Socio</th>
                        
                        <th colspan="2"></th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->precio}}</td>
                        <td>{{$role->comision_invitado}}</td>
                        <td>{{$role->comision_socio}}</td>


                        <td width='10px'> 
                            <a class="btn btn-secondary" href="{{route('admin.products.edit', $role)}}">Edit</a>
                        </td>
                        <td width='10px'>
                            <form action="{{route('admin.products.destroy', $role)}}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger" type='submit'>Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        
                    <tr>
                        <td colspan="4"> No hay ningun roll registrado</td>
                    </tr>

                    @endforelse
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