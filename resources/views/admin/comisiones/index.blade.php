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
                        <th>Vendedor / Trabajador</th>
                        <th>Pedidos</th>
                        <th>Metodo</th>
                        
                        <th class="text-center">Fecha Solicitud</th>

                        <th class="text-center">Transferir</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($gastos->reverse() as $gasto)
                        <tr>
                            <td>{{$gasto->id}}</td>
                            <td> 
                                    {{$gasto->user->name}}<br>
                            </td>
                            <td> 
                                @foreach ($gasto->pedidos as $pedido)
                                    @php
                                    $subtotal=0;
                                    @endphp
        
                                    @if($pedido->pedidoable_type=="App\Models\Socio")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->comision_socio;
        
                                    @endphp    
                                    @endforeach
        
                                    @endif
                                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->comision_invitado;
        
                                    @endphp    
                                    @endforeach
        
                                    @endif

                                     Pedido {{$pedido->id}} - ${{$subtotal}} <br>
                                @endforeach
                                
                            </td>
                            <td>{{$gasto->metodo}}</td>
                           {{-- comment
                            <td>
                                <img class="object-cover object-center" width="60px" src="{{Storage::url($pago->comprobante)}}" alt="">
                            
                            </td> --}}
                            <td class="text-center">{{$gasto->created_at->format('d-m-Y H:i:s')}}</td>
                            <td>
                                {!! Form::open(['route'=>['admin.gastos.update',$gasto],'files'=>true , 'autocomplete'=>'off', 'method'=> 'PUT' ]) !!}
                                                    @csrf

                                                        <div class="h-32">
                                                            <h1 class="text-xl text-center"><b>$</b> {{number_format($gasto->cantidad)}}</h1>
                                                            <hr class="w-full">
                                                            
                                                            @if ($gasto->user->vendedor)
                                    

                                                            <h1 class="text-md text-center"><b>Nombre:</b> {{$gasto->user->vendedor->user->name}}</h1>
                                                            <h1 class="text-md text-center"><b>Rut:</b> {{$gasto->user->vendedor->rut}}</h1>
                                                            <h1 class="text-md text-center"><b>Banco:</b> {{$gasto->user->vendedor->banco}}</h1>
                                                            <h1 class="text-md text-center"><b>Cuenta:</b> {{$gasto->user->vendedor->tipo_cuenta}}</h1>
                                                            <h1 class="text-md text-center"><b>Nro Cuenta:</b> {{$gasto->user->vendedor->nro_cuenta}}</h1>
                                                            
                                                            @endif

                                                            <hr class="w-full">
                                                            {!! Form::file('comprobante', ['class'=>'form-input w-full mt-6'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
                                                            @error('foto')
                                                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                                            @enderror

                                                            
                                                        </div>

                                                        <div class="flex justify-center">
                                                            {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                        </div>
                                                    
                                    {!! Form::close() !!}
                            </td>
                            <td> 
                                <form action="{{route('admin.gastos.destroy',$gasto)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"> RECHAZAR </button>
                                </form>
                            </td>
                            
                        </tr>
                        
                    @endforeach

                </tbody>
            </table>
            <table class="table table-striped mt-4">
                <tbody class="">
                    @foreach ($gastosok->reverse() as $gasto)
                        <tr>
                            <td>{{$gasto->id}}</td>
                            <td> 
                                {{$gasto->user->name}}<br>
                            </td>
                            <td> 
                                @foreach ($gasto->pedidos as $pedido)
                                    @php
                                    $subtotal=0;
                                    @endphp
        
                                    @if($pedido->pedidoable_type=="App\Models\Socio")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->comision_socio;
        
                                    @endphp    
                                    @endforeach
        
                                    @endif
                                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->comision_invitado;
        
                                    @endphp    
                                    @endforeach
        
                                    @endif

                                     Pedido {{$pedido->id}} - ${{$subtotal}} <br>
                                @endforeach
                                
                            </td>
                            <td>{{$gasto->metodo}}</td>
                            <td>{{$gasto->cantidad}}</td>
                            <td></td>
                            <td>
                                <img class="object-cover object-center" width="60px" src="{{Storage::url($gasto->comprobante)}}" alt="">
                            
                            </td>
                            <td>{{$gasto->created_at->format('d-m-Y H:i:s')}}</td>
                            <td>
                                <form action="" >
                                    
            
                                    <button class="btn btn-success" type="submit">Aprobado</button>
                                </form>   
                            </td>
                           
                            
                        </tr>
                        
                    @endforeach

                </tbody>
            </table>
            
        </div>

        <div class="card-footer">
            {{$gastos->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop