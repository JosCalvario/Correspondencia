<x-app-layout>
    <x-validation-errors></x-validation-errors>
    @if(session('success'))
    <x-success-message>{{session('success')}}</x-success-message>
    @endif
    <div href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Corte de solicitudes</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Genera un reporte de los últimos documentos entrantes</p>
        <a href="{{route('reports.closing')}}" target="_BLANK" class="mt-8 inline-block text-sc_greener bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Generar</a>
        <button type="button" data-modal-toggle="checkClosing" class="mt-8 inline-block text-white bg-sc_greeny border focus:outline-none hover:bg-sc_greener font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Realizar corte</button>
    </div>

  
  <div id="checkClosing" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="p-6 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de esta acción?</h3>
                  <a href="{{route('reports.checkClosing')}}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Si, realizar corte
                  </a>
                  <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
              </div>
          </div>
      </div>
  </div>
  
</x-app-layout>