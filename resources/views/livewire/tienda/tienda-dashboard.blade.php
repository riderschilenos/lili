<div>
    @php
        $total=0;
        $total7=0;
        $total30=0;
    @endphp

@foreach ($pagos as $pago)
@php
       $total+=$pago->cantidad;
@endphp
@endforeach
@if ($tickets)
@foreach ($tickets as $ticket)
@php
       $total30+=$ticket->inscripcion;
@endphp
@endforeach
@endif

@if ($suscripcions30)
@foreach ($suscripcions30 as $suscripcion)
@php
       $total30+=$suscripcion->precio;
@endphp
@endforeach
@endif


@foreach ($pagos7 as $pago)
@php
       $total7+=$pago->cantidad;
@endphp
@endforeach
@foreach ($pagos30 as $pago)
@php
       $total30+=$pago->cantidad;
@endphp
@endforeach

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <div class="pt-6 px-4">
                        
            @if ($tienda->productos)
                <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">${{number_format($total30)}}</span>
                                <h3 class="text-base font-normal text-gray-500">Ventas del mes</h3>
                            </div>
                            <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                @if ($total>0)
                                    {{number_format(($total30)*100/$total,2)}}
                                    %
                                @else
                                    0
                                @endif
                              
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <figure class="highcharts-figure" class="mt-8">
                            <div id="grafico"></div>
                        </figure>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Últimas transacciones</h3>
                            <span class="text-base font-normal text-gray-500">Pedidos pagados</span>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">Ver más</a>
                        </div>
                        </div>
                        <div class="flex flex-col mt-8">
                        <div class="overflow-x-auto rounded-lg">
                            <div class="align-middle inline-block min-w-full">
                                <div class="shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Transacción
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha y hora
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                Payment from <span class="font-semibold">Bonnie Green</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 23 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $2300
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                                Payment refund to <span class="font-semibold">#00910</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 23 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                -$670
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                Payment failed from <span class="font-semibold">#087651</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 18 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $234
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                                Payment from <span class="font-semibold">Lana Byrd</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 15 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $5000
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                Payment from <span class="font-semibold">Jese Leos</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 15 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $2300
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                                Payment from <span class="font-semibold">THEMESBERG LLC</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 11 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $560
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                Payment from <span class="font-semibold">Lana Lysle</span>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                Apr 6 ,2021
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                $1437
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-col justify-center items-center">
                    <div class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                        <div class="mt-2 mb-8 w-full">
                            <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-white">
                                ¡Bienvenidos al administrador de tu tienda online! 
                            </h4>
                            <p class="mt-2 px-2 text-base text-gray-600">
                                Aquí encontrarás un espacio ideal para dar vida a tu negocio digital. Te invitamos a empezar a cargar tus productos, creando categorías que reflejen tu estilo y oferta. ¡Explora las posibilidades y comienza a crecer en el mundo online hoy mismo!
                            </p>
                        </div> 
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">

                            <div class="flex flex-col items-start justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 pb-4 pt-2 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                                    <p class="text-xs font-semibold uppercase text-[#4e5058] dark:text-[#b5bac1] mb-2">Crea tus productos uno a uno</p>
                                    <div class="flex items-center justify-between gap-16">
                                        <div class="flex items-center gap-4">
                                        <img src="https://cdn.discordapp.com/embed/avatars/0.png?size=128" alt="Discord" class="h-14 w-14 rounded-xl" draggable="false" />
                                        <div>
                                            <a target="_blank" rel="noopener noreferrer" href="https://discord.com"><h1 class="cursor-pointer font-normal text-[#060607] hover:underline dark:text-white">Carga manual</h1></a>
                                            
                                        </div>
                                        </div>
                                        <a rel="noopener noreferrer" href="{{route('tiendas.productos.manual',$tienda)}}"><button class="focus-visible:ring-ring ring-offset-background inline-flex h-10 items-center justify-center rounded-md bg-[#248046] px-4 py-2 text-sm font-medium text-[#e9ffec] transition-colors hover:bg-[#1a6334] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">CARGAR</button></a>
                                    
                                    
                                </div>
                            </div>
        
                            <div class="flex flex-col items-start justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 pb-4 pt-2 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                                <p class="text-xs font-semibold uppercase text-[#4e5058] dark:text-[#b5bac1] mb-2">Utiliza el gestor de productos</p>
                                <div class="flex items-center justify-between gap-16">
                                    <div class="flex items-center gap-4">
                                    <img src="https://cdn.discordapp.com/embed/avatars/0.png?size=128" alt="Discord" class="h-14 w-14 rounded-xl" draggable="false" />
                                    <div>
                                        <a target="_blank" rel="noopener noreferrer" href="https://discord.com"><h1 class="cursor-pointer font-normal text-[#060607] hover:underline dark:text-white">Carga inteligente</h1></a>
                                        
                                    </div>
                                    </div>
                                    <a rel="noopener noreferrer" href="{{route('tiendas.productos.inteligente',$tienda)}}"><button class="focus-visible:ring-ring ring-offset-background inline-flex h-10 items-center justify-center rounded-md bg-[#248046] px-4 py-2 text-sm font-medium text-[#e9ffec] transition-colors hover:bg-[#1a6334] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">CARGAR</button></a>
                                
                                    
                                </div>
                            </div>
        
                        
                        </div>
                    </div>  
                </div>
            @endif
        
        
            <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                <a href="{{route('tiendas.pedidos',$tienda)}}">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$pedidos->count()}}</span>
                                <h3 class="text-base font-normal text-gray-500">Pedidos del mes</h3>
                            </div>
                            <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                @if ($pedidostotal->count()>0)
                                    {{number_format(($pedidos->count())*100/$pedidostotal->count(),2)}}
                                    %
                                @else
                                    0
                                @endif
                               
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('tiendas.pedidos',$tienda)}}">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$pedidostotal->count()}}</span>
                                <h3 class="text-base font-normal text-gray-500">Pedidos en total</h3>
                            </div>
                            
                        </div>
                    </div>
                </a>
                <a href="{{route('tiendas.productos',$tienda)}}">
                    <div class="bg-white hover:bg-gray-100 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($tienda->productos->count())}}</span>
                                <h3 class="text-base font-normal text-gray-500">Productos</h3>
                            </div>
                            <div class="hidden ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                14.6%
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Últimos compradores</h3>
                        <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        Ver más
                        </a>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200">
                            <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $320
                                </div>
                            </div>
                            </li>
                            <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/bonnie-green.png" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Bonnie Green
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d4b1b9b5bdb894a3bdbab0a7a0b1a6fab7bbb9">[email&#160;protected]</a>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $3467
                                </div>
                            </div>
                            </li>
                            <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/michael-gough.png" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Michael Gough
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="57323a363e3b17203e3933242332257934383a">[email&#160;protected]</a>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $67
                                </div>
                            </div>
                            </li>
                            <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/thomas-lean.png" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Thomes Lean
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="284d45494144685f41464c5b5c4d5a064b4745">[email&#160;protected]</a>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $2367
                                </div>
                            </div>
                            </li>
                            <li class="pt-3 sm:pt-4 pb-0">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/lana-byrd.png" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Lana Byrd
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a2c7cfc3cbcee2d5cbccc6d1d6c7d08cc1cdcf">[email&#160;protected]</a>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $367
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Ventas por categoría</h3>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                            <tr>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Categoria</th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Cantidad</th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Porcentaje %</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Organic Search</th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">5,649</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">30%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Referral</th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">4,025</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">24%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-orange-300 h-2 rounded-sm" style="width: 24%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Direct</th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">3,105</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">18%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-teal-400 h-2 rounded-sm" style="width: 18%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Social</th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">1251</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">12%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-pink-600 h-2 rounded-sm" style="width: 12%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Other</th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">734</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">9%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-indigo-600 h-2 rounded-sm" style="width: 9%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th class="border-t-0 align-middle text-sm font-normal whitespace-nowrap p-4 pb-0 text-left">Email</th>
                                <td class="border-t-0 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 pb-0">456</td>
                                <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">7%</span>
                                        <div class="relative w-full">
                                        <div class="w-full bg-gray-200 rounded-sm h-2">
                                            <div class="bg-purple-500 h-2 rounded-sm" style="width: 7%"></div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    @php
        $final=$now->format('d')+date('t', strtotime($now."- 1 month"));
        $inicio=$now->format('d')+1;
        $dias=[];

        foreach (range($inicio,($final)) as $number) {
              
                if($number>date('t', strtotime($now."- 1 month"))){
                   $nro=($number- date('t', strtotime($now."- 1 month")));
                }else{
                   $nro=$number;
                }  
               $dias[]=$nro;
            }
        

        $ventas=[];
        foreach ($dias as $day) {
            $totaldia=0;
            foreach ($pagos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldia+=$pago->cantidad;
                }
            }
            foreach ($suscripcions30 as $suscripcion){
                if (intval($suscripcion->created_at->format('d')) == $day) {
                    $totaldia+=$suscripcion->precio;
                }
            }
       
            $ventas[]=$totaldia;
            }
    @endphp
    <script>
        var ventas = <?php echo json_encode($ventas) ?>;
        var dias = <?php echo json_encode($dias) ?>;
   
           Highcharts.chart('grafico', {
            chart: {
                    type: 'areaspline'
                },
            
            title: {
                        text: ''},
            exporting: {
                enabled: false // Esto deshabilita el menú contextual
            },
                       
            yAxis: {
                title: {
                    text: ''
                }
                                },
            colors: ['#01c600','#cd2300'],
            xAxis: {
                    categories: dias
                    },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                
            },

            series: [{
                name: 'Ventas',
                data: ventas
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

            });
    </script>
</div>
