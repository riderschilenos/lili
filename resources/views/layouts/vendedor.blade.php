<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 ">

                <aside class="hidden sm:block">
                    <a href="{{route('vendedor.home.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Listado de la pedidos</a>
        
                    <ul class="text-sm text-gray-600 mt-2 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('vendedor.pedidos.edit',$pedido) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="">Información de la serie</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('vendedor.pedidos.edit',$pedido) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="">Videos de la serie</a>
                        </li>
                   
                        <li class="leading-7 mb-1 border-l-4 @routeIs('vendedor.pedidos.edit',$pedido) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="">Sponsors</a>
                        </li>
                    </ul>

                    <form action="" method="POST">
                        @csrf

                        <button class="btn btn-danger" type="submit">Solicitar Revisión</button>
                    </form>
        
                </aside>

                <div class="block sm:hidden py-4 px-5 col-span-5">
                    <a href="{{route('vendedor.home.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Listado de la pedidos</a>
                </div>

                <div class="col-span-5 sm:col-span-4 card">
                    

                    <main class="card-body text-gray-600">
        
                        {{$slot}}
                        
                    </main>
                    
        
                </div>
        
                
            </div>
        
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>
