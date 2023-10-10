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
     <x-web.tableRow options="false">

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

       @if ($response->document != null)
       <x-web.tableDataFile storage="responses">{{ $response->document }}</x-web.tableDataFile>
       @else
       <x-web.tableData label='documento'>Sin documento</x-web.tableData>
       
       @endif
       <td class="flex justify-end items-center">
        <a href="{{ route('responses.show', $response->id) }}"
          class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
          type="button">
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
           <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
          </svg>
         </a>
      </td>
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
