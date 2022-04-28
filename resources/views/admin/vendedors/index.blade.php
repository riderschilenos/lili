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
            <th>Ventas</th>
            
            <th>Estado</th>
        
            <th></th>

        </thead>
        
        <tbody>
            @foreach ($vendedors->reverse() as $vendedor)
                <tr>
                    <td>{{$vendedor->id}}</td>
                    <td>{{$vendedor->user->name}}</td>
                    <td>{{$vendedor->user->email}}</td>
                    <td>
                        @php
                            $total=0;
                        @endphp
                        @foreach ($vendedor->user->pedidos as $pedido)
                            @if($pedido->pedidoable_type=="App\Models\Socio")
                            @foreach ($pedido->ordens as $orden)
                            @php
                                
                                $total+=$orden->producto->precio-$orden->producto->descuento_socio;
        
                            @endphp    
                            @endforeach
        
                            @endif
                            @if($pedido->pedidoable_type=="App\Models\Invitado")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $total+=$orden->producto->precio;
            
                                @endphp    
                                @endforeach
            
                            @endif
                        @endforeach
                        
                        
                        ${{number_format($total)}}</td>
                  
                    <td>
                        @if($vendedor->estado==2)
                        ACTIVO
                        @else
                         INACTIVO
                        @endif
                    
                    </td>
                    
                    <td width="10px">
                        {{-- comment 
                        <a class="btn btn-primary" href="{{route('socio.show', $vendedor)}}">Ver Perfil</a>--}}
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