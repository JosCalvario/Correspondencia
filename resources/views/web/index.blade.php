<x-app-layout>

  <main class="h-auto">
  <div class="rounded-lg min-h-56 h-auto mb-4 bg-white p-8 flex items-center justify-between flex-wrap">

    <div class="mb-5">
      <h2 class="font-bold text-4xl mb-3 font-sans">Bienvenido <span class="text-sc_greeny">{{Auth::user()->name}}</span></h2>
      <p class="text-base text-sc_rat">Te deseamos un buen día en la oficina</p>

      
    </div>
    <img class="w-44" src="{{ asset('img/gregorio.png') }}" alt="">
  </div>
    
    
    <div class="grid md:grid-cols-2 grid-cols-1 grid-flow-row gap-4 mb-4">
      <a href="{{route('requests.index')}}" class="bg-sc_greeny rounded-lg h-48 p-6 md:h-72 flex justify-between hover:scale-95 ease-in-out duration-200">
        <div>
          <h2 class="font-bold text-4xl text-sc_quartz mb-3 font-sans">Solicitudes</h2>
          <p class="text-base text-sc_quartz">
            {{$countPending == 1 ? 'Tienes ' . $countPending . ' solicitud pendiente para esta semana' : 'Tienes ' . $countPending . ' solicitudes pendientes para esta semana'}}
            </p>
        </div>
        <div class="rounded-full flex items-center justify-center bg-white w-8 h-8 ">
          <p class="block font-bold text-sc_rat">{{$countPending}}</p>
        </div>
      </a>
      <a href="{{route('responses.index')}}" class="bg-sc_sandy rounded-lg h-48 p-6 md:h-72 flex justify-between hover:scale-95 ease-in-out duration-200">
        <div>
          <h2 class="font-bold text-4xl text-sc_quartz mb-3 font-sans">Folios</h2>
          <p class="text-base text-sc_quartz">
            {{$countDate == 1 ? 'Tienes ' . $countDate . ' folio por vencer' : 'Tienes ' . $countDate . ' folios por vencer'}}</p>
        </div>
        <div class="rounded-full flex items-center justify-center bg-white w-8 h-8 ">
          <p class="block font-bold text-sc_rat">
            {{$countDate}}</p>
        </div>
      </a>
    </div>
    
  </main>
  
</x-app-layout>