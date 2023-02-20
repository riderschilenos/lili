@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
@stop

@section('content')

    @if ($gastos->count())
        @livewire('admin.comisiones-pay')
    @endif
    @if ($retiros->count())
        @livewire('organizador.retiros-pay')
    @endif

   
    
    @livewire('admin.contabilidad')

    @livewire('admin.pedidos-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop