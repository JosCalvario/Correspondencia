<x-validation-errors></x-validation-errors>
<x-web.container title="Documentos salientes" search="true" actions="false" filters="true" add="false">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option"
   searchModel="search"></x-web.searchInput>
 </x-slot>

 <x-slot name="filtersSelect">

  <x-web.filtersSelect dropDownId="filterDropdown">
   <x-slot name="filterOptions">
    <x-web.filterOption filterModel="filters.status" value="all">Todos</x-web.filterOption>
    <x-web.filterOption filterModel="filters.status" value="Contestado">Contestados</x-web.filterOption>
    <x-web.filterOption filterModel="filters.status" value="Vigente">Vigente</x-web.filterOption>
    <x-web.filterOption filterModel="filters.status" value="Cancelado">Cancelados</x-web.filterOption>
   </x-slot>
  </x-web.filtersSelect>
 </x-slot>

 <x-slot name="Table">
  <x-web.table headers="Tipo de documento|Folio|Fecha|Solicitud(es)|Asunto|Solicitante de folio|Estado|Documento">
   <x-slot name="data">
    @foreach ($responses as $response)
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData label='Estado'>{{ $response->document_type }}</x-web.tableData>
       <x-web.tableData label='Folio'>{{ $response->folio }}</x-web.tableData>
       <x-web.tableData label='Fecha'>{{ $response->date }}</x-web.tableData>
       <x-web.tableData label='Solicitudes'>
        @php
         $requests = $response->requests()->get();
        @endphp

        @if (count($requests) > 0)
         @foreach ($requests as $request)
          {{ $request->folio }}: {{ $request->name }}
          @if (!$loop->last)
           <br>
          @endif
         @endforeach
        @else
         Sin solicitudes
        @endif
       </x-web.tableData>
       <x-web.tableData label='Asunto'>{{ $response->subject }}</x-web.tableData>
       <x-web.tableData label='Solicitante'>{{ $response->applicant->name }}</x-web.tableData>
       <x-web.tableData label='Estado'>{{ $response->status }}</x-web.tableData>

       {{-- Modal agregar documento ================================== --}}

       @if ($response->document == null)
        <td data-label="Fecha"
         class=" before:content-[attr(data-label)] text-left before:mb-2 sm:before:content-none px-3 py-3 sm:table-cell block before:block before:font-semibold">
         <button type="button" data-modal-toggle="doc{{ $response->id }}"
          class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener hover:cursor-pointer">Agregar</button>
        </td>

        <div id="doc{{ $response->id }}" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
         <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
           <!-- Modal header -->
           <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
             Agregar documento
            </h3>
            <button type="button"
             class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
             data-modal-toggle="doc{{ $response->id }}">
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
               d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
               clip-rule="evenodd"></path>
             </svg>
             <span class="sr-only">Close modal</span>
            </button>
           </div>
           <!-- Modal body -->
           <form action="{{ route('responses.storeResponse',[$response->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$response->id}}">
            <div class="grid gap-4 mb-4 sm:grid-cols-1">
             <x-web.formLabel for="document">Documento</x-web.formLabel>
             <x-web.formInput type="file" name="document" id="document" required="true">
             </x-web.formInput>
            </div>
            <div class="flex items-center space-x-4">
             <button type="submit"
              class="text-white bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Guardar
             </button>
            </div>
           </form>
          </div>
         </div>
        </div>
       @else
       <x-web.tableDataFile storage="responses">{{ $response->document }}</x-web.tableDataFile>
       @endif

      </x-slot>

      <x-slot name="detailModal">
       <x-web.detailModal-sm toggleId="showModal{{ $response->id }}">
        <x-slot name="modalTitle">
         Documento saliente
        </x-slot>
        <x-slot name="modalHeader">
         Folio: {{ $response->folio }}
         @if ($response->status == 'Vigente')
          <p class="font-bold text-sc_sandy">
           {{-- Status --}}
           Estado: {{ $response->status }}
          </p>
         @elseif ($response->status == 'Contestado')
          <p class="font-bold text-sc_greeny">
           {{-- Status --}}
           Estado: {{ $response->status }}
          </p>
         @else
          <p class="font-bold text-red-500">
           {{-- Status --}}
           Estado: {{ $response->status }}
          </p>
         @endif
        </x-slot>

        <x-slot name="dataList">
         <x-web.dataTerm>Solicitud(es)</x-web.dataTerm>
         <x-web.dataDescription>
          @php
           $requests = $response->requests()->get();
          @endphp

          @if (count($requests) > 0)
           @foreach ($requests as $request)
            {{ $request->name }}
            @if (!$loop->last)
             <br>
            @endif
           @endforeach
          @else
           Sin solicitudes
          @endif
         </x-web.dataDescription>

         <x-web.dataTerm>Fecha</x-web.dataTerm>
         <x-web.dataDescription>{{ $response->date }}</x-web.dataDescription>

         <x-web.dataTerm>Tipo de documento de respuesta</x-web.dataTerm>
         <x-web.dataDescription>{{ $response->document_type }}</x-web.dataDescription>
        </x-slot>

        <x-slot name="modalActions">

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
          Responder
         </x-web.modalAnchor>
         @if ($response->document != '')
          <x-web.modalButton doc="{{ $response->document }}">
           Previsualizar
          </x-web.modalButton>
         @endif


        </x-slot>
       </x-web.detailModal-sm>
      </x-slot>

     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>

 <x-slot name="navigation">
  {{ $responses->links() }}
 </x-slot>
</x-web.container>
