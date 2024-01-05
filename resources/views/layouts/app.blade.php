<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
                <!-- Google tag (gtag.js) -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=G-92Q72DQR36"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
        
                gtag('config', 'G-92Q72DQR36');
                </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />
        <meta name="description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, haz click y revisa lo que hay detras de este link.">
        @isset($ft)

            {{$ft}}
            
        @else
            <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

        @endisset
       
        
        @isset($tl)

            {{$tl}}
            
        @else
            <title>{{ config('app.name', 'RidersChilenos') }}</title>

        @endisset
       

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
                
        
        <!-- Styles -->

        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        {{-- comment<script src="{{ asset('js/instascan.min.js')}}"></script>

        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> --}}
        <!-- include the library -->
        <script src="{{asset('js/html5scan5.js')}}" type="text/javascript"></script>
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- 
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />         --}}

    
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('css')
        
        @livewireStyles
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css"></script>
        

    </head>
    <body class="font-sans antialiased">
        <style>
            
            :root {
                --main-color: #4a76a8;
                --rider-color: #314780;
            }
        
            .bg-main-color {
                background-color: var(--main-color);
            }
        
            .bg-rider-color {
                background-color: var(--rider-color);
            }
        
            .text-main-color {
                color: var(--main-color);
            }
        
            .border-main-color {
                border-color: var(--main-color);
            }
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            td, th {
              border: 1px solid #dddddd;
              text-align: center;
              padding: 8px;
            }
            
            tr:nth-child(even) {
              background-color: #dddddd;
            }

            .words::-webkit-scrollbar {
                display: none;
            }

            .raider::-webkit-scrollbar {
                display: none;
            }
            
            /* Aplicar estilos específicos para pantallas pequeñas (menos de 600px de ancho) */
            @media screen and (max-width: 600px) {
              table {
                border-collapse: collapse;
                width: 100%;
              }
              th, td {
                padding: 6px;
                text-align: left;
              }
            }
        </style>
        
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100"  x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, evento: false, video: false, registro: false, user: false, vendedor: false, novedades: false}">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="h-16 text-white md:hidden">
                Riderschilenos
            </div>
       

            <main style="z-index: 10;" class="pt-1"> 
                {{ $slot }}
            </main>
            
        </div>

        @stack('modals')

        @livewireScripts
  
        @isset($js)

            {{$js}}

        @endisset
        {{--         <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        comment --}}

        
    </body>
</html>
