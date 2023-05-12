
  <div class="flex justify-center w-full bg-blue-900">

    <div class="rounded-lg mt-12 mb-28">
    
        <div class="z-10 bg-blue-900 rounded-lg pb-20">
          <div class="flex mb-24">
            @foreach ($tickets->reverse() as $ticket)
              <div class="bg-white w-full rounded-lg px-6 py-5 mt-4">

                
                <div class="w-full mx-12">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center justify-between  my-1">
                      <span class="mr-3 rounded-full bg-white">

                      <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                      
                      </span>
                        <h2 class="text-xl mx-4">Entrada {{$ticket->evento->titulo}}</h2>
                      </div>
                    
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5"></div>
                    <div class="flex items-center">
                    
                      <div class="flex flex-col mx-auto">
                        <a href="{{route('ticket.view',$ticket)}}">
                          <img class="object-cover object-center" width="150px" src="{{Storage::url($ticket->qr)}}" class="p-1">
                        </a>
                      </div>
                    
                    </div>
                 
                  </div>
                </div>
                
                </div>
              </div>
            @endforeach
          

          </div>
      
        </div>

    </div>
  </div>
