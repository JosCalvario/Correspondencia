<x-app-layout>
    <x-validation-errors></x-validation-errors>
    <div tabindex="-1" aria-hidden="true"
     class="m-0 overflow-y-auto overflow-x-hidden right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
     <!-- Modal content -->
     <div class="relative p-4 bg-white h-[calc(100vh-8rem)] rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-auto">
      <!-- Modal header -->
      <div class="flex justify-between mb-4 rounded-t sm:mb-5 w-full">
       <div class="flex justify-start items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 w-full">
        <a href="{{ route('responses.index') }}" type="button"
         class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 mr-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
         <i class="bi bi-chevron-left"></i>
        </a>
        <h3 class="font-semibold text-gray-900 dark:text-white">
         Contestación
        </h3>
       </div>
       <div>
   
       </div>
      </div>
      <dl>
           <x-web.dataTerm>Folio</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->folio }}</x-web.dataDescription>
   
           <x-web.dataTerm>Correo</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->email }}</x-web.dataDescription>
   
           <x-web.dataTerm>Fecha</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->date }}</x-web.dataDescription>
   
           <x-web.dataTerm>Recibe</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->recieves }}</x-web.dataDescription>
   
           <x-web.dataTerm>Asunto</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->subject }}</x-web.dataDescription>
   
           <x-web.dataTerm>Solicitante de folio</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->applicant->name }}</x-web.dataDescription>
           
           <x-web.dataTerm>Departamento</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->area->name }}</x-web.dataDescription>
           
           <x-web.dataTerm>Tipo de documento</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->document_type }}</x-web.dataDescription>
           
           <x-web.dataTerm>Estado</x-web.dataTerm>
           <x-web.dataDescription>{{ $response->status }}</x-web.dataDescription>
           
           
               @if ($response->document)
                    <x-web.dataTerm>Documento</x-web.dataTerm>
                    <a target="_BLANK" href="{{asset('/storage/responses/'. $response->document)}}">Documento<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                      </svg></a> 
                      {{-- aregla tony porfa --}}
               @endif
          </dl>
      <div class="flex gap-4 items-center">
        @if (!($response->document || $response->cancelation))
        <button data-modal-toggle="addDocument" type="button"
        class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer sm:w-fit w-full">Agregar respuesta</button>

        <x-web.detailModal-sm button="false" toggleId="addDocument">
            <x-slot name="modalTitle">Documento de respuesta</x-slot>
            <x-slot name="dataList">
             <form action="{{ route('responses.storeResponse',$response->id) }}" method="POST" enctype="multipart/form-data" class="h-full">
              @csrf
              @method('PUT')
              <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-auto h-[calc(100%-8rem)] content-start relative p-1">
        
               <div class="sm:col-span-2">
                <x-web.formLabel for="name">Subir documento</x-web.formLabel>
                <x-web.formInput type="file" name="document" id="document" required="true"></x-web.formInput>
               </div>
        
              </div>
              <div class="flex items-center space-x-4 p-5 justify-end m-0">
                <button type="submit"
                 class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                 Actualizar
                </button>
               </div>
              <x-slot name="modalActions">
                
              </x-slot>
        
             </form>
            </x-slot>
        
           </x-web.detailModal-sm>

        <button data-modal-toggle="cancelFolio" type="button"
        class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_red rounded-lg hover:bg-sc_greener focus:ring-4 focus:outline-none hover:cursor-pointer sm:w-fit w-full">Cancelar folio</button>
        <x-web.detailModal-sm button="false" toggleId="cancelFolio">
            <x-slot name="modalTitle">Cancelar folio</x-slot>
            <x-slot name="dataList">
             <form action="{{ route('folios.cancelFolio',$response->id) }}" method="POST" enctype="multipart/form-data" class="h-full">
              @csrf
              @method('PUT')
              <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-auto h-[calc(100%-8rem)] content-start relative p-1">
        
               <div class="sm:col-span-2">
                <x-web.formLabel for="name">Motivo de cancelación</x-web.formLabel>
                <x-web.formInput type="text" name="cancelation" required="true"></x-web.formInput>
               </div>
        
              </div>
              <div class="flex items-center space-x-4 p-5 justify-end m-0">
                <button type="submit"
                 class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                 Actualizar
                </button>
               </div>
              <x-slot name="modalActions">
                
              </x-slot>
        
             </form>
            </x-slot>
        
           </x-web.detailModal-sm>
               @endif
       
      </div>
     </div>
    </div>
    </div>
   </x-app-layout>
   