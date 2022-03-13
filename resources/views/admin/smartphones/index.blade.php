@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
    <h1 class="text-center">Lista de Smartphone's</h1>
@stop

@section('content')
@php
$total=0;

foreach ($smartphones->reverse() as $smartphone)
    {$total=$total+$smartphone->stock;
    
    }
@endphp

        <div>
            @livewire('admin.smartphone-create')
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                
                <div class="col">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header"><b class="h1">{{$total}}</b>    Stock Total  ( ${{number_format($total*2500)}} ) </div>
                    <div class="card-body">
                        @foreach ($marcasmartphones as $marcasmartphone)
                            @php
                                $subtotal=0;
                            @endphp
                            @foreach ($smartphones as $smartphone)
                                @if ($smartphone->marcasmartphone_id==$marcasmartphone->id)
                                    @php
                                         $subtotal=$subtotal+$smartphone->stock;
                                    @endphp
                                   
                                    
                                @endif
                                
                            @endforeach
                            <h5 class="card-title">{{$subtotal}}  {{$marcasmartphone->name}} </h5><br>
                        @endforeach
                       
                    </div>
                    </div>
                </div>
                <div class="col">

                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Stock Critico</div>
                        <div class="card-body">
                            @php
                                $subcritico=0;
                            @endphp
                            @foreach ($smartphones as $item)
                                @if ($item->stock<3)
                                    @php
                                         $subcritico+=1;
                                    @endphp
                                
                                    <h5 class="card-title"> {{$item->modelo}} Stock: {{$item->stock}}</h5>
                                    
                                @endif
                                
                                
                            @endforeach
                            @if ($subcritico==0)

                                <h1>Sin Stock Critico</h1>
                            @endif
                        
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>

        
          

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
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>stock</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($smartphones->reverse() as $smartphone)
                     
                        <tr>
                            <td>
                                {{$smartphone->id}}
                            </td>
                            <td>
                                {{$smartphone->marcasmartphone->name}}
                            </td>
                            <td>
                                {{$smartphone->modelo}}
                            </td>
                            <td>
                                {{$smartphone->stock}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.disciplinas.edit',$smartphone)}}">Editar Stock</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.modelos.destroy',$smartphone)}}" method="POST">
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