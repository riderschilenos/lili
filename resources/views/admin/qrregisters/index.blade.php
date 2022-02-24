@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.qrregister.create')}}">Nuevos Qr</a>
    <h1>QR REGISTER'S</h1>
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
                        <th>PASS</th>
                        <th>SLUG</th>
                        <th>PROCESO</th>
                        <th>TIPO</th>
                        <th>ESTADO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qrregisters as $qrregister)
                        <tr>
                            <td>
                                {{$qrregister->id}}
                            </td>
                            <td>
                                {{$qrregister->nro}}
                            </td>
                            <td>
                                {{$qrregister->pass}}
                            </td>
                            <td>
                                 @if($qrregister->active_date==NULL)
                                 {{'https://riderschilenos.cl/garage/'.$qrregister->slug}}
                                @else
                            
                                    <a href="{{'https://riderschilenos.cl/garage/'.$qrregister->slug}}" target="_blank">{{'https://riderschilenos.cl/garage/'.$qrregister->slug}}</a>
                                @endif
                                
                            </td>
                            <td>
                                @livewire('admin.qrregister-proceso', ['qrregister' => $qrregister], key($qrregister->id))
                            </td>
                            <td>
                                {{$qrregister->value}}
                            </td>
                            <td>
                                @if($qrregister->active_date==NULL)
                                    INACTIVO
                                @else
                            
                                    {{$qrregister->active_date}}
                                @endif
                                
                            </td>
                            
                            <td width="10px">
                                <form action="{{route('admin.disciplinas.destroy',$qrregister)}}" method="POST">
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