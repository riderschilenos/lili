<div class="w-full bg-blue-900 p-20 flex justify-center">
  <div class="max-w-4xl my-12"> 
      <div class="grid grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-2 "> 
          @foreach ($tickets->reverse() as $ticket)

                          <div class="bg-white shadow-lg rounded-xl p-4">
             
                                <div class="flex items-center justify-between  my-1">
                                    <div class="mr-3 rounded-full">

                                        <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                                    
                                    </div>
                                    <div>
                                      <h2 class="text-xl mx-4">Entrada {{$ticket->titulo}}</h2>
                                      <h2 class="text-lg mx-4">{{$ticket->created_at}}</h2>
                                    </div>
                                </div>
                              
                                              <div class="flex justify-center mx-auto mb-5">
                                                <a href="{{route('ticket.view',$ticket)}}">
                                                  <img class="object-center" width="150px" src="{{Storage::url($ticket->qr)}}" class="p-1">
                                                </a>
                                              </div>
                                            

                                          @switch($ticket->status)
                                                @case(1)
                                                        <div class="font-semibold text-center">
                                                            <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                            CERRADO (SIN PAGAR)
                                                            </a>
                                                        </div>
                                                    @break
                                                @case(2)
                                                        <div class="font-semibold text-center">
                                                          <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                          SIN PAGAR
                                                          </a>
                                                        </div>
                                                    @break
                                                @case(3)
                                                        <div class="font-semibold text-center">
                                                          <a href="" class="btn btn-success h-4 my-auto">
                                                          VIGENTE
                                                          </a>
                                                        </div>
                                                    @break
                                                  @case(4)
                                                        <div class="font-semibold text-center">
                                                          <a href="" class="btn btn-danger h-4 my-auto">
                                                            CERRADO
                                                          </a>
                                                        </div>
                                                    @break
                                                  @case(5)
                                                        <div class="font-semibold text-center">
                                                          <a href="" class="btn btn-danger h-4 my-auto">
                                                            COBRADA
                                                          </a>
                                                        </div>
                                                    @break
                                                
                                            @default
                                                
                                          @endswitch  
                                  </div>
            @endforeach
      </div>
    </div>
</div>