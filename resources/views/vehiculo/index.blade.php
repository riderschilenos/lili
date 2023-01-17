<x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">

        <div class="max-w-7xl mx-auto py-8 ">      
            <div class="card">
                <div class="card-body">
                    <h1 class="hidden text-2xl font-bold text-center">Registro RCH</h1>
                    
                            <div class="mx-auto flex justify-center mt-4">
                                            
                               
                            </div>

                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2">
                                <article>
                                    <figure class="hidden sm:flex justify-center">
                                        <a href="{{route('socio.index')}}"><img class="rounded-xl md:mr-8 ml-24 object-contain object-center" width="300" src="{{asset('img/home/qrpubli.png')}}" alt=""></a>
                                    </figure>
                                    <figure class="flex justify-center sm:hidden">
                                        <a href="{{route('socio.index')}}"><img class="rounded-xl mx-auto md:mr-8 object-contain object-center" width="140" src="{{asset('img/home/qrpubli.png')}}" alt=""></a>
                                    </figure>
                
                                
                                </article>
                                <article>
                                        <div>

                                            <div>
                                                
                                                <div class="flex-wrap md:flex justify-center">
                                                
                                                    <!-- Step Checkout -->
                                                    <div class="my-12 ml-2 md:ml-12 md:mt-4  md:w-2/3">
                                                      <div class="relative flex pb-4">
                                                        <div class="absolute inset-0 flex h-full w-10 items-center justify-center">
                                                          <div class="pointer-events-none h-full w-1 bg-gray-200"></div>
                                                        </div>
                                                        <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                                          </svg>
                                                        </div>
                                                        <div class="flex-grow pl-4">
                                                          <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">1 Registro AntiRobo</h2>
                                                          <p class="font-laonoto leading-relaxed">
                                                            Al momento de escanear el  <br />
                                                            <b>QR CODE </b>se despliega la Información sobre la pertenencia del vehiculo
                                                          </p>
                                                        </div>
                                                      </div>
                                                      <div class="relative flex pb-4">
                                                        <div class="absolute inset-0 flex h-full w-10 items-center justify-center">
                                                          <div class="pointer-events-none h-full w-1 bg-gray-200"></div>
                                                        </div>
                                                        <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                                          </svg>
                                                        </div>
                                                        <div class="flex-grow pl-4">
                                                          <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">2 Registro de Mantenciones</h2>
                                                          <p class="font-laonoto leading-relaxed">Podras <b>registrar</b> ຫຼື <b>la realizacion de cada una de las mantenciones realizadas a tu vehiculo</b>.</p>
                                                        </div>
                                                      </div>
                                                      <div class="relative flex pb-4">
                                                        <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                                            <circle cx="12" cy="5" r="3"></circle>
                                                            <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                                                          </svg>
                                                        </div>
                                                        <div class="flex-grow pl-4">
                                                          <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">3 Facil Instalación / Sin mantención</h2>
                                                          <p class="font-laonoto leading-relaxed">
                                                            Lo compras una vez y disfrutas sin costos de <span> <b>mantención</b></span
                                                            >.
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>



                                            <a class="hidden sm:flex justify-center" href="{{route('garage.vehiculo.create')}}">
                                                
                                                <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                                                
                                                    Inscribe tu Juguete
            
                                                </button>
                                            </a>

                                        </div>
                                
                                </article>
                               
                            
                            </div>
                            <a class="flex justify-center sm:hidden" href="{{route('garage.vehiculo.create')}}">
                                                
                                <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                                
                                    Inscribe tu Juguete

                                </button>
                            </a>
                    
                
                    <hr class="mt-2 mb-4">

                        
                        
                    @livewire('vehiculo.vehiculo-search')
                
                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </x-fast-view>

</x-app-layout>