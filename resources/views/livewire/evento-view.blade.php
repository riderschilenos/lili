<div class="flex justify-center w-full bg-blue-900">

  <div class="rounded-lg mt-12 mb-28">
  
      <div class="z-10 bg-blue-900 rounded-lg pb-20">
        <div class="flex mb-24">
          <div class="bg-white w-full rounded-lg px-6 py-5">

            
              <div class="w-full mx-12">
                <div class="flex items-center justify-between">
                  <div class="flex items-center justify-between  my-1">
                    <span class="mr-3 rounded-full bg-white">
                    <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                    </span>
                      <h2 class="text-xl mx-4">{{$evento->titulo}}</h2>
                    </div>
                   
                  </div>
                  <div class="border-b border-dashed border-b-2 my-5"></div>
                  <div class="flex items-center">
                   
                    <div class="flex flex-col mx-auto">
                    <img src="{{Storage::url($evento->image->url)}}" class="w-20 p-1">
    
                    </div>
                   
                  </div>
                  <div class="border-b border-dashed border-b-2 my-5 pt-5">
                    <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                    <h1 class="text-xs text-center">Información de carrera</h1>
                  
                  </div>
                  <div class="flex items-center mb-5 p-5 text-sm">
                    <div class="flex flex-col">
                      <span class="text-sm">Categoria</span>
                      <div class="font-semibold">Elite</div>
    
                    </div>
                    <div class="flex flex-col ml-auto">
                      <span class="text-sm">Inscritos</span>
                      <div class="font-semibold text-center">26</div>
    
                    </div>
                  </div>
                  <div class="flex items-center mb-4 px-5 gap-x-6">
                    <div class="flex flex-col text-sm">
                      <span class="">Entrenamientos</span>
                      <div class="font-semibold">11:50AM</div>
    
                    </div>
                    <div class="flex flex-col mx-auto text-sm">
                      <span class="">Clasificación</span>
                      <div class="font-semibold">11:30Am</div>
    
                    </div>
                    <div class="flex flex-col text-sm">
                      <span class="">Final</span>
                      <div class="font-semibold">2:00PM</div>
    
                    </div>
                  </div>
                  <div class="border-b border-dashed border-b-2 my-5 pt-5">
                    <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                    <h1 class="text-xs text-center">Información del Rider</h1>
                  
                  </div>
                  <div class="flex items-center px-5 pt-3 text-sm">
                    <div class="flex flex-col">
                      <span class="">Rider</span>
                      <div class="font-semibold">Ajimon</div>
    
                    </div>
                    <div class="flex flex-col mx-auto">
                      <span class="">Class</span>
                      <div class="font-semibold">Economic</div>
    
                    </div>
                    <div class="flex flex-col">
                      <span class="">Seat</span>
                      <div class="font-semibold">12 E</div>
    
                    </div>
                  </div>
                  <div class="flex flex-col py-5  justify-center text-sm ">
                    <h6 class="font-bold text-center">Boarding Pass</h6>
    
         
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
    
      </div>

  </div>
</div>
