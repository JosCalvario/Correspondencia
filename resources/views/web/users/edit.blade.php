<div tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Usuario
                        </h3>
                        
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                    </div>
                </div>
                <dl>
                    <x-web.dataTerm>Nombre</x-web.dataTerm>
                    <x-web.dataDescription>{{ $user->name }}</x-web.dataDescription>
           
                    <x-web.dataTerm>Email</x-web.dataTerm>
                    <x-web.dataDescription>{{ $user->email }}</x-web.dataDescription>
           
                    <x-web.dataTerm>Area asignada</x-web.dataTerm>
                    <x-web.dataDescription>{{ $user->area != null ? $user->area->name : '' }}</x-web.dataDescription>
                </dl>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <x-web.modalAnchor>
                            <x-slot name="icon">
                             <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                              <path fill-rule="evenodd"
                               d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                               clip-rule="evenodd"></path>
                             </svg>
                            </x-slot>
                            Editar
                           </x-web.modalAnchor>
                    </div>              
                </div>
        </div>
    </div>
  </div>