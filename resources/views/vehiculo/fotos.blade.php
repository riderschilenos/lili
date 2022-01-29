<x-app-layout>
    
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Vende tu Juguete Rider</h1>
                <hr class="mt-2 mb-2">

              <div class="flex justify-center">
                <div class="flex p-5 mt-4 space-x-4 items-center shadow-xl max-w-sm rounded-md">
                  @if($vehiculo->marca->image)  
                    <img src="https://avatars.githubusercontent.com/u/5550850?v=4" alt="image" class="h-14 w-14 rounded-full" />
                  @endif
                  <div>
                    <h2 class="text-gray-800 font-semibold text-xl">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada}}</h2>
                    <p class="mt-1 text-gray-400 text-center text-sm cursor-pointer">{{$vehiculo->año}}</p>
                  </div>
                </div>
              </div>      

                <div class="w-full py-6">
                    <div class="flex">
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-white w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Información</div>
                      </div>
                  
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded transition-all duration-500" style="width: 100%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-white w-full">
                                <svg class="w-7 h-7 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Fotos</div>
                      </div>
                  
                      
                      <div class="w-1/4">
                        
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-gray-600 w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Precio/Comisión</div>
                      
                      </div>
                      
                  
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-gray-600 w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Publicación</div>
                      </div>
                    </div>
                  </div>
                {{-- comment  
                  <div class="card">
                    <div class="card-body">
                      <form action="{{route('garage.upload',$vehiculo)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <input type="file" name="file" id="">
    
                        </div>
                        <button type="submit" class="btn btn-primary"> Subir Imagen</button>
                      </form>
                    </div>
                  </div>
                 --}}
                   
                  <form action="{{route('garage.upload',$vehiculo)}}"
                  method="POST"
                  class="dropzone"
                  id="my-awesome-dropzone">
                  <div class="dz-message " data-dz-message>
                    <h1 class="text-xl font-bold">Seleccione Imágenes</h1>
                    <span>Utiliza fotos sacadas de dia donde puedas mostrar todos los detalles importantes de tu Vehiculo</span>
                  </div>
                  </form>

              @if($vehiculo->image->first())
                  
                  <div class="flex justify-center">
                      <a href="{{route('garage.comision',$vehiculo)}}">
                        <button class="btn btn-primary mt-4">
                          Siguiente
                        </button>
                      </a>
                  </div>
              @else
                  <img class="h-60 w-full object-cover object-center" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
              
              @endif
                
                
            </div>
        </div>

    </div>


    <x-slot name="js">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
      <script>
        /*
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
          headers:{
            'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
          },
          acceptedFiles: "image/*",
          maxFilesize: 8,
          maxFiles: 6
            
            };
*/
      </script>

    </x-slot>
    

</x-app-layout>