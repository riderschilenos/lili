@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>IMPRESIÓN QR REGISTER'S</h1>
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
                        <th>Numero</th>
                        <th>Numero</th>
                        <th>PASS</th>
                        
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qrregisters as $qrregister)
                    @if($qrregister->proceso>2)
                        <tr>
                            <td>
                                {{$qrregister->id}}
                            </td>
                            <td>
                                <p class=""><b>{{$qrregister->nro}}</b></p>

                            </td>
                            <td>
                                <p class="h2"><b>{{$qrregister->nro}}</b></p>
                            </td>
                            <td>
                                <p class="h2"><b>{{$qrregister->pass}}</b></p>
                            </td>
                           
                           
                            
                        </tr>
                    @endif
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