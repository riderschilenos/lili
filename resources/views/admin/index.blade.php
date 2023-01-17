@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
@stop

@section('content')

    
    @livewire('admin.contabilidad')

    @livewire('admin.pedidos-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop