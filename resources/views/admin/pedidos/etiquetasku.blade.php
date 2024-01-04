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
      
        <link rel="stylesheet" href="{{public_path('vendor/fontawesome-free/css/all.min.css')}}">
       
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('css')
        
        @livewireStyles
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
          

            <!-- Page Content -->
            <main>
                    <div>
                    <h1 class="text-center pt-8"> CODIGOS DE BARRA {{$producto->name}}</h1>
                    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8 grid grid-cols-6 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 gap-x-4 gap-y-2">
                     
                                    
                                
                            
                                @foreach ($arrayNumeros as $item)
                                        <div class="mt-4">
                                            <p class="text-center text-xs">{{$producto->name}}</p>
                                            <img class="w-full" src="data:image/png;base64,{{DNS1D::getBarcodePNG($producto->sku, 'C39',1,70,array(1,1,1), true)}}" alt="barcode"   />
                                        </div>
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