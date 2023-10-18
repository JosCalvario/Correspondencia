<div>
 <section class="bg-white dark:bg-gray-900 rounded">
  <div class="py-4 px-4 mx-auto w-4/5 lg:py-12">
   <h2 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Solicita un folio de respuesta</h2>
   <h3 class="mb-4 text-md text-gray-700 dark:text-white">Ingresa los datos para ingresar tu solicitud</h3>
   <div class="absolute bottom-0 right-0 z-50 flex flex-col justify-center items-center mr-5 bluebag gap-1">
    @foreach ($errors->all() as $error)
     <div
      class="bg-red-600 w-full text-white font-semibold flex items-center justify-center m-5 mt-0 p-3 text-base rounded-lg gap-2 z-50">
      <i class="bi bi-x-circle"></i>
      Error:
      {{ $error }}
   
     </div>
    @endforeach
   
   </div>
   <form action="{{ route('folios.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
     <div class="">
      <label for="applicant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
      <input type="text" name="applicant" id="applicant"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
       disabled readonly value="{{ auth()->user()->name }}">
     </div>
     <div class="">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="text" name="email" id="email"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
       readonly value="{{ auth()->user()->email }}">
     </div>
     <div class="">
      <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
      <input type="text" name="area" id="area"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
       readonly disabled value="{{ auth()->user()->area?->name }}">
     </div>
     <div>
      <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
       documento</label>
      <select type="text" name="document_type" id="document_type"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
       required="" list="document_types">
       <datalist id="document_types">
        <option disabled selected hidden>Selecciona</option>
        <option value="Oficio">Oficio</option>
        <option value="Memorándum">Memorándum</option>
        <option value="Circular">Circular</option>
       </datalist>
      </select>
     </div>
     <div class="">
      <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
      <input type="date" name="date" id="date"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
     </div>
     <div class="">
      <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto</label>
      <input type="text" name="subject" id="subject"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
     </div>
     <div class="">
      <label for="recieves" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receptor</label>
      <input type="text" name="recieves" id="recieves"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
     </div>
     <div class="">
      <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo del
       receptor</label>
      <input type="text" name="position" id="position"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sc_greeny focus:border-sc_greeny block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
     </div>
     <div class="sm:col-span-3 flex flex-col gap-3 w-full">
      <input class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sc_greeny focus:border-sc_greeny" wire:model="searchF" type="text" placeholder="Buscar">
      @if (count($requests) > 0)
       <label for="request_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona las
        solicitudes a responder</label>
        
       @foreach ($requests as $request)
        @php
         $name = 'Folio: ' . $request->folio . ' | Nombre: ' . $request->name . ' | ';
        @endphp
        <div class="bg-gray-200 p-3 rounded-lg w-full">
         <input type="checkbox" value="{{ $request->id }}" name="requests[]"
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
         {{ $name }}
         @if ($request->document != '')
          <a target="_BLANK" class="text-sc_greeny rounded-lg inline-block p-1 px-2"
           href="{{ asset('storage/requests/' . $request->document) }}">Ir a documento</a>
         @endif
        </div>
       @endforeach
      @else
       <label for="request_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No hay solicitudes
        pendientes</label>

      @endif
     </div>

     {{-- Hiddens --}}
     <input type="hidden" name="area_id" value="{{ auth()->user()->area?->id }}">
     <input type="hidden" name="applicant_id" value="{{ auth()->user()->id }}">
    </div>
    <button type="submit"
     class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
     Solicitar folio
    </button>
   </form>
  </div>
 </section>
</div>
