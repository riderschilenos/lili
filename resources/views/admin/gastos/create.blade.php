@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
<div>
   
        @php
            $total=0;
        @endphp
    
        @foreach ($gastos->reverse() as $ga) 
            @php
                    $total=$total+$ga->cantidad;
                    
            @endphp
    
        @endforeach

        

</div>
    <h1 class="float-right"> ${{number_format($total)}}</h1>
    <h1>Gastos</h1>
    
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
                {!! Form::open(['route'=>'admin.marcas.store']) !!}
                    <thead>
                        <tr>
                            
                            <th>{!! Form::label('disciplina_id', 'Tipo de gastos:') !!}{!! Form::select('disciplina_id', $gastotypes, null , ['class'=>'form-input ml-2']) !!}</th>
                            <th>{!! Form::label('cantidad','Cantidad: ') !!}{!! Form::text('cantidad',null, ['class'=>'form-input ml-2','placeholder'=>'Cantidad en pesos $']) !!}</th>
                            <th>Boleta <input type="file" name="file" id=""></th>
                            
                            
                            <th>
                                <form action="" >
                            

                                    <button class="btn btn-primary" type="submit">Nuevo Gasto</button>
                                </form> 
                            </th>
                        </tr>
                    </thead>
                {!! Form::close() !!}
                
            </table>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vendedor / Trabajador</th>
                    
                        <th>Metodo</th>
                        <th>Tipo</th>
                        
                        <th class="text-center">Fecha Solicitud</th>

                        <th class="text-center">Transferir</th>

                    </tr>
                </thead>

                
            </table>
            <table class="table table-striped mt-4">
                <tbody class="">
                    @foreach ($gastosok->reverse() as $gasto)
                        <tr>
                            <td>{{$gasto->id}}</td>
                            <td> 
                                @if($gasto->user)
                                {{$gasto->user->name}}<br>
                                @endif
                            </td>
                            
                            <td>{{$gasto->gastotype->name}}</td>
                            <td>{{$gasto->metodo}}</td>
                            <td>${{number_format($gasto->cantidad)}}</td>
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