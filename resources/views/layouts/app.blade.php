<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />
        <meta name="description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, registrate y disfruta los beneficios que tenemos para ti y la comunidad.">
        <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
        @livewireStyles

        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100"  x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, registro: false, user: false, vendedor: false}">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main style="z-index: 10;"> 
                {{ $slot }}
            </main>
            
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>
