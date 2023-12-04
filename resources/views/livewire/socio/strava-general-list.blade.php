<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full px-3 mb-6  mx-auto">
    <div class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
      <div class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
       
        <!-- end card header -->
        <!-- card body  -->
        <div class="flex-auto block py-8 pt-6 px-9">
          <div class="overflow-x-auto">
            <table class="w-full my-0 align-middle text-dark border-neutral-200">
              <thead class="align-bottom">
                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                  <th class="pb-3 text-center min-w-[175px]">RIDER</th>
                  <th class="pb-3 text-center min-w-[100px]">DISCIPLINA</th>
                  <th class="pb-3 text-center min-w-[100px]">KILOMETROS</th>
                  <th class="pb-3 pr-12 text-center min-w-[175px]">PROGRESO</th>
                  <th class="pb-3 text-center min-w-[50px]">DETAILS</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($atletas_stravas as $atleta)  
                    <tr class="border-b border-dashed last:border-b-0">
                        <td class="p-3 pl-4">
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0 rounded-2xl me-3">
                            <img src="{{$atleta->user->profile_photo_url }}" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                            </div>
                            <div class="flex flex-col justify-start">
                            <a href="javascript:void(0)" class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-base  text-secondary-inverse hover:text-primary">{{$atleta->user->name}}</a>
                            </div>
                        </div>
                        </td>
                    
                        <td class="p-3 text-center">
                        <div class="flex justify-center">
                            <span class="text-center px-4 py-3 mx-auto items-center font-semibold text-base text-red-600 bg-red-100 rounded-lg"> {{$atleta->user->socio->disciplina->name}} </span>
                        </div>
                        </td>
                        <td class="pr-0 text-center">
                            <span class="font-semibold text-light-inverse text-md/normal">2023-08-23</span>
                            </td>
                        <td class="p-3 pr-0 text-center">
                        <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg> 6.5% </span>
                        </td>
                    
                       
                        <td class="p-3 pr-0 text-center">
                        <div class="flex justify-center">
                            <button class="text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center">
                            <span class="flex items-center justify-center p-0 m-0 leading-none shrink-0 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>
                            </button>
                        </div>
                        </td>
                    </tr>
                    
                @endforeach
    
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
    <p class="text-sm text-slate-500 py-1"> Tailwind CSS Component from <a href="https://www.loopple.com/theme/riva-dashboard-tailwind?ref=tailwindcomponents" class="text-slate-700 hover:text-slate-900" target="_blank">Riva Dashboard</a> by <a href="https://www.loopple.com" class="text-slate-700 hover:text-slate-900" target="_blank">Loopple Builder</a>. </p>
  </div>
</div>