<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />
        <meta name="description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, haz click y revisa lo que hay detras de este link.">
        <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script type="text/javascript" src="js/instascan.min.js"></script>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
              console.log(content);
            });
            Instascan.Camera.getCameras().then(function (cameras) {
              if (cameras.length > 0) {
                scanner.start(cameras[0]);
              } else {
                console.error('No cameras found.');
              }
            }).catch(function (e) {
              console.error(e);
            });
            let opts = {
           // Whether to scan continuously for QR codes. If false, use scanner.scan() to manually scan.
           // If true, the scanner emits the "scan" event when a QR code is scanned. Default true.
           continuous: true,
           
           // The HTML element to use for the camera's video preview. Must be a <video> element.
           // When the camera is active, this element will have the "active" CSS class, otherwise,
           // it will have the "inactive" class. By default, an invisible element will be created to
           // host the video.
           video: document.getElementById('preview'),
           
           // Whether to horizontally mirror the video preview. This is helpful when trying to
           // scan a QR code with a user-facing camera. Default true.
           mirror: true,
           
           // Whether to include the scanned image data as part of the scan result. See the "scan" event
           // for image format details. Default false.
           captureImage: false,
           
           // Only applies to continuous mode. Whether to actively scan when the tab is not active.
           // When false, this reduces CPU usage when the tab is not active. Default true.
           backgroundScan: true,
           
           // Only applies to continuous mode. The period, in milliseconds, before the same QR code
           // will be recognized in succession. Default 5000 (5 seconds).
           refractoryPeriod: 5000,
           
           // Only applies to continuous mode. The period, in rendered frames, between scans. A lower scan period
           // increases CPU usage but makes scan response faster. Default 1 (i.e. analyze every frame).
           scanPeriod: 1
         };
          </script>
        {{-- 
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />         --}}

        @livewireStyles

        @yield('css')
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
        </style>
        
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100"  x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, registro: false, user: false, vendedor: false}">
            @livewire('navigation-menu')

            <!-- Page Content -->

            <div class="w-full text-white bg-main-color block md:hidden">
                <div x-data="{ open: false }"
                    class="flex flex-col max-w-screen-xl pt-3 pb-4 md:py-0 px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="flex flex-row items-center justify-center">
                        @livewire('search')
                    </div>
                </div>
            </div>
            
            <main style="z-index: 10;"> 
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
