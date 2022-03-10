@php
    ob_start();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{public_path('img/logo.png')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{public_path('vendor/fontawesome-free/css/all.min.css')}}">
       
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
          

            <!-- Page Content -->
            <main>
                    <div>
                    
                    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-24">
                        @foreach($etiquetas as $etiqueta)
                        @foreach($pedidos as $pedido)
                            @if ($pedido->id==$etiqueta)
                                
                            
                                

                                <div class="flex justify-center">
                                    <div class="flex flex-col w-full p-5 mx-auto card">
                                            <div class="flex justify-between ">
                                                <div class="flex flex-col w-full mx-auto">
                                                    <div class="flex">
                                                        <h1 class="text-xl">ETIQUETA DE DESPACHO #<small>{{1469+$pedido->id}}</small></h1>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <div>
                                                            FECHA July 6, 2021
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="brand">
                                                    <span class="flex items-center justify-center space-x-3 transition-all duration-1000 ease-out transform text-thumeza-500">
                                                        <img class="w-24 h-24 object-contain" src="{{asset('img/logo.png')}}">
                                                    </span>
                                                </div>
                                            </div>
                                
                                            <div class=" border-t-2 border-gray-200 "></div>
                                
                                            <div class="flex justify-between mt-3">
                                                <div class="flex flex-col ">
                                                    <strong>Remitente:</strong>
                                                    <p class="text-sm">
                                                        Gonzalo Peñaloza Verdugo<br>
                                                        18.648.284-0<br>
                                                        +569 631 767 26<br>
                                                        Requinoa, Sexta Región<br>
                                                    </p>
                                                </div>
                                                <div class="ml-2 flex flex-col">
                                                    <strong>Destinatario:</strong>
                                                    <p class="text-sm">
                                                        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    {{$invitado->name}}<br>{{$invitado->rut}}<br>{{$invitado->fono}}<br>{{$invitado->email}}
                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )
                {{$socio->user->name}}<br>{{$socio->rut}}<br>{{$socio->fono}}<br>{{$socio->user->email}}
        
                @endif
            @endforeach
        @endif
                                                        
                                                    </p>
                                
                                                </div>
                                                
                                            </div>
                                           
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @endforeach
                    </div>
                        
                    </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>

@php
    $html=ob_get_clean();
    echo $html;


@endphp