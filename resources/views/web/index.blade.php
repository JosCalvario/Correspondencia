<x-app-layout>

  <main class="h-auto">
  <div class="rounded-lg min-h-56 h-auto mb-4 bg-white p-8 flex items-center justify-between flex-wrap">

    <div class="mb-5">
      <h2 class="font-bold text-4xl mb-3 font-sans">Bienvenido <span class="text-sc_greeny">{{Auth::user()->name}}</span></h2>
      <p class="text-base text-sc_rat">Te deseamos un buen día en la oficina</p>

      
    </div>
    <img class="w-44" src="{{ asset('img/gregorio.png') }}" alt="">
  </div>
    
    
    <div class="grid grid-cols-2 gap-4 mb-4">
      <div class="bg-sc_greeny rounded-lg h-48 p-6 md:h-72 flex justify-between">
        <div>
          <h2 class="font-bold text-4xl text-sc_quartz mb-3 font-sans">Solicitudes</h2>
          <p class="text-base text-sc_quartz">Tienes 3 solicitudes pendientes para esta semana</p>
        </div>
        <div class="rounded-full flex items-center justify-center bg-white w-8 h-8 ">
          <p class="block font-bold text-sc_rat">3</p>
        </div>
      </div>
      <div class="bg-sc_sandy rounded-lg h-48 p-6 md:h-72 flex justify-between">
        <div>
          <h2 class="font-bold text-4xl text-sc_quartz mb-3 font-sans">Folios</h2>
          <p class="text-base text-sc_quartz">Tienes 2 folios por vencer</p>
        </div>
        <div class="rounded-full flex items-center justify-center bg-white w-8 h-8 ">
          <p class="block font-bold text-sc_rat">2</p>
        </div>
      </div>
    </div>
    
  </main>

</x-app-layout>