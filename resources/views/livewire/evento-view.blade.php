<div class="flex justify-center w-full bg-blue-900">
  <style>
    .barcode {
      left: 50%;
      box-shadow: 1px 0 0 1px, 5px 0 0 1px, 10px 0 0 1px, 11px 0 0 1px, 15px 0 0 1px, 18px 0 0 1px, 22px 0 0 1px, 23px 0 0 1px, 26px 0 0 1px, 30px 0 0 1px, 35px 0 0 1px, 37px 0 0 1px, 41px 0 0 1px, 44px 0 0 1px, 47px 0 0 1px, 51px 0 0 1px, 56px 0 0 1px, 59px 0 0 1px, 64px 0 0 1px, 68px 0 0 1px, 72px 0 0 1px, 74px 0 0 1px, 77px 0 0 1px, 81px 0 0 1px, 85px 0 0 1px, 88px 0 0 1px, 92px 0 0 1px, 95px 0 0 1px, 96px 0 0 1px, 97px 0 0 1px, 101px 0 0 1px, 105px 0 0 1px, 109px 0 0 1px, 110px 0 0 1px, 113px 0 0 1px, 116px 0 0 1px, 120px 0 0 1px, 123px 0 0 1px, 127px 0 0 1px, 130px 0 0 1px, 131px 0 0 1px, 134px 0 0 1px, 135px 0 0 1px, 138px 0 0 1px, 141px 0 0 1px, 144px 0 0 1px, 147px 0 0 1px, 148px 0 0 1px, 151px 0 0 1px, 155px 0 0 1px, 158px 0 0 1px, 162px 0 0 1px, 165px 0 0 1px, 168px 0 0 1px, 173px 0 0 1px, 176px 0 0 1px, 177px 0 0 1px, 180px 0 0 1px;
      display: inline-block;
      transform: translateX(-90px);
    }
  </style>
  <div class="rounded-lg mt-8 mb-16">
  
      <div class="w-full  z-10 bg-blue-900 rounded-lg">
        <div class="flex ">
          <div class="bg-white drop-shadow-2xl  rounded-lg p-4 m-4">
            <div class="flex-none sm:flex">
            
              <div class="flex-auto justify-evenly">
                <div class="flex items-center justify-between">
                  <div class="flex items-center  my-1">
                    <span class="mr-3 rounded-full bg-white w-8 h-8">
                    <img src="{{asset('img/logo.png')}}" class="h-8 p-1">
                </span>
                    <h2 class="font-medium mx-4">{{$evento->titulo}}</h2>
                  </div>
                  <div class="ml-auto text-blue-800">A380</div>
                </div>
                <div class="border-b border-dashed border-b-2 my-5"></div>
                <div class="flex items-center">
                  <div class="flex flex-col">
                    <div class="flex-auto text-xs text-gray-400 my-1">
                      <span class="mr-1 ">MO</span><span>19 22</span>
                    </div>
                    <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">COK</div>
                    <div class="text-xs">Cochi</div>
    
                  </div>
                  <div class="flex flex-col mx-auto">
                    <img src="{{Storage::url($evento->image->url)}}" class="w-20 p-1">
    
                    </div>
                    <div class="flex flex-col ">
                      <div class="flex-auto text-xs text-gray-400 my-1">
                        <span class="mr-1">MO</span><span>19 22</span>
                      </div>
                      <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">DXB</div>
                      <div class="text-xs">Dubai</div>
    
                    </div>
                  </div>
                  <div class="border-b border-dashed border-b-2 my-5 pt-5">
                    <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                    <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                  </div>
                  <div class="flex items-center mb-5 p-5 text-sm">
                    <div class="flex flex-col">
                      <span class="text-sm">Flight</span>
                      <div class="font-semibold">Airbus380</div>
    
                    </div>
                    <div class="flex flex-col ml-auto">
                      <span class="text-sm">Gate</span>
                      <div class="font-semibold">B3</div>
    
                    </div>
                  </div>
                  <div class="flex items-center mb-4 px-5">
                    <div class="flex flex-col text-sm">
                      <span class="">Board</span>
                      <div class="font-semibold">11:50AM</div>
    
                    </div>
                    <div class="flex flex-col mx-auto text-sm">
                      <span class="">Departs</span>
                      <div class="font-semibold">11:30Am</div>
    
                    </div>
                    <div class="flex flex-col text-sm">
                      <span class="">Arrived</span>
                      <div class="font-semibold">2:00PM</div>
    
                    </div>
                  </div>
                  <div class="border-b border-dashed border-b-2 my-5 pt-5">
                    <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                    <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                  </div>
                  <div class="flex items-center px-5 pt-3 text-sm">
                    <div class="flex flex-col">
                      <span class="">Passanger</span>
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
    
                    <div class="barcode h-14 w-0 inline-block mt-4 relative left-auto"></div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
    
      </div>

  </div>
</div>
