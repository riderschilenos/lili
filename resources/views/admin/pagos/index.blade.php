@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Pagos pendientes de aprobación</h1>
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
                        <th>Vendedor</th>
                        <th>Metodo</th>
                        <th>Cantidad</th>
                        <th>Comprobante</th>
                        <th></th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($pagos as $pago)
                        <tr>
                            <td>{{$pago->id}}</td>
                            <td> 
                                @foreach ($pago->pedidos as $pedido)
                                    {{$pedido->vendedor->name}}
                                @endforeach
                                
                            </td>
                            <td>{{$pago->metodo}}</td>
                            <td>{{$pago->cantidad}}</td>
                            <td>
                                <img class="object-cover object-center" width="60px" src="{{Storage::url($pago->comprobante)}}" alt="">
                            
                            </td>
                            <td>
                                <form action="{{route('admin.pago.approved',$pago)}}" method="POST">
                                    @csrf
            
                                    <button class="btn btn-primary" type="submit">Aprobar</button>
                                </form>   
                            </td>
                        </tr>
                        
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{$pagos->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop