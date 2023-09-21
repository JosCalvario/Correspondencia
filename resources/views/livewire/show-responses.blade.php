<x-web.container title="Documentos salientes" search="true" actions="false" filters="true" add="false">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option"
   searchModel="search"></x-web.searchInput>
 </x-slot>


 <x-slot name="actionsSelect">
  <x-web.actionsSelect dropDownId="actionsDropdown">
   <x-slot name="actions">
    <x-web.actionAnchor actionModel="xd">acción 1</x-web.actionAnchor>
   </x-slot>

   <x-slot name="mainAction">
    <x-web.mainActionAnchor actionModel="xd">acción principal</x-web.mainActionAnchor>
   </x-slot>
  </x-web.actionsSelect>
 </x-slot>

 <x-slot name="filtersSelect">
  <x-web.filtersSelect dropDownId="filterDropdown">
   <x-slot name="filterOptions">
    <x-web.filterOption filterModel="xd">filtro 1</x-web.filterOption>
   </x-slot>
  </x-web.filtersSelect>
 </x-slot>

 <x-slot name="Table">
  <x-web.table headers="Folio|Fecha|Solicitud(es)|Asunto|Solicitante de folio|Estado|Documento">
   <x-slot name="data">
    @foreach ($responses as $response)
     <x-web.tableRow options="true">

      <x-slot name="tableData">
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
       <td data-label="Fecha"
        class=" before:content-[attr(data-label)] text-left before:mb-2 sm:before:content-none px-3 py-3 sm:table-cell block before:block before:font-semibold">
        <button type="button" data-modal-toggle="answer{{ $response->id }}"
         class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener hover:cursor-pointer">Agregar</button>
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
