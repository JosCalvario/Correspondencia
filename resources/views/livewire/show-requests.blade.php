<x-web.container title="Solicitudes" search="true" actions="true" filters="true" add="true">

 <x-slot name="searchInput">
  <x-web.searchInput placeholder="Nombre documento, número o asunto" :optionsModel="$options" optionModel="option"
   searchModel="search"></x-web.searchInput>
 </x-slot>

 <x-slot name="addbutton">
  @can('requests.store')
   <x-web.addTableButton createModalId="createModal">Agregar documento</x-web.addTableButton>
  @endcan
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
  <x-web.table headers="Número|Nombre|Tipo|Fecha|Remitente|Asunto|Área asignada|Documento|Contestación">
   <x-slot name="data">
    @foreach ($requests as $request)

    @php
        $date = \Carbon\Carbon::parse($request->date);
        $today = \Carbon\Carbon::today();
        $days = $today->diffInDays($date);
        $color = 'sc_greeny';
        if($days >= 5)
          $color = 'sc_sandy';
        if($days >= 7)
          $color = 'sc_red';

    @endphp
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData label='Número' color="bg-{{$color}}">{{ $request->number }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $request->name }}</x-web.tableData>
       <x-web.tableData label='Tipo de documento'>{{ $request->document_type }}</x-web.tableData>
       <x-web.tableData label='Fecha'>{{ $request->date }}</x-web.tableData>
       <x-web.tableData label='Emisor'>{{ $request->sender }}</x-web.tableData>
       <x-web.tableData label='Asunto'>{{ $request->subject }}</x-web.tableData>
       <x-web.tableData label='Departamento'>{{ $request->area->name }}</x-web.tableData>
       @if ($request->document != '')
        <x-web.tableDataFile>{{ $request->document }}</x-web.tableDataFile>
       @else
        <td></td>
       @endif
       <x-web.tableData label='Contestación'></x-web.tableData>
      </x-slot>

      <x-slot name="detailModal">
       <x-web.detailModal-sm toggleId="showModal{{ $request->id }}">
        <x-slot name="modalTitle">
         Acuse
        </x-slot>
        <x-slot name="modalHeader">
         Folio: {{ $request->number }}
        </x-slot>
        <x-slot name="dataList">
         <x-web.dataTerm>Nombre</x-web.dataTerm>
         <x-web.dataDescription>{{ $request->name }}</x-web.dataDescription>

         <x-web.dataTerm>Fecha</x-web.dataTerm>
         <x-web.dataDescription>{{ $request->date }}</x-web.dataDescription>

         <x-web.dataTerm>Remitente</x-web.dataTerm>
         <x-web.dataDescription>{{ $request->sender }}</x-web.dataDescription>

         <x-web.dataTerm>Asunto</x-web.dataTerm>
         <x-web.dataDescription>{{ $request->subject }}</x-web.dataDescription>

         <x-web.dataTerm>Departamento asignado</x-web.dataTerm>
         <x-web.dataDescription>{{ $request->area->name }}</x-web.dataDescription>
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
         <x-web.modalButton>
          Previsualizar
         </x-web.modalButton>
        </x-slot>
       </x-web.detailModal-sm>
      </x-slot>

     </x-web.tableRow>
    @endforeach
   </x-slot>
  </x-web.table>
 </x-slot>

 <x-slot name="Modal">
  <x-web.createModal-lg createmodalId="createModal" title="Agregar documento" permission="requests.store">
   <x-slot name="form">
    <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data" class="h-full">
     @csrf
     @method('POST')
     <div class="grid gap-2 mb-4 sm:grid-cols-2 overflow-y-scroll h-[calc(100%-8rem)] relative p-1">
      <div>
       <x-web.formLabel for="folio">Folio asignado</x-web.formLabel>
       <x-web.formInput type="text" name="folio" id="folio" readonly="true">
        {{ $folio }}
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="document_type">Tipo de documento</x-web.formLabel>
       <x-web.formInput type="comboBox" name="document_type" id="date" required="true" list="document_types">
        <x-slot name="dataListOptions">
         <option value="Oficio"></option>
         <option value="Memorándum"></option>
         <option value="Circular"></option>
        </x-slot>
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="dependency">Dependencia</x-web.formLabel>
       <x-web.formInput type="text" name="dependency" id="dependency" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="department">Departamento</x-web.formLabel>
       <x-web.formInput type="text" name="department" id="department" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="date">Fecha</x-web.formLabel>
       <x-web.formInput type="date" name="date" id="date" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="number">Número</x-web.formLabel>
       <x-web.formInput type="text" name="number" id="number" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="sender">Remitente</x-web.formLabel>
       <x-web.formInput type="text" name="sender" id="sender" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="sender_position">Posición del
        remitente</x-web.formLabel>
       <x-web.formInput type="text" name="sender_position" id="sender_position" required="true">
       </x-web.formInput>
      </div>
      <div class="sm:col-span-2">
       <x-web.formLabel for="theme">Tema</x-web.formLabel>
       <x-web.formInput type="text" name="theme" id="subject" required="true">
       </x-web.formInput>
      </div>
      <div class="sm:col-span-2">
       <x-web.formLabel for="subject">Asunto</x-web.formLabel>
       <x-web.formInput type="text" name="subject" id="subject" required="true">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="assigned_area">Asignar
        departamento</x-web.formLabel>
       <x-web.formInput type="select" name="assigned_area" id="assigned_area" required="true"
        placeholder="Asigna un departamento">

        <x-slot name="options">
         @foreach ($areas as $area)
          <option value="{{ $area->id }}">{{ $area->name }}</option>
         @endforeach
        </x-slot>
       </x-web.formInput>
      </div>

      <div class="sm:col-span-2">
       <x-web.formLabel for="observations">Observaciones</x-web.formLabel>
       <x-web.formInput type="textarea" name="observations" id="observations" rows="2" required="true"
        placeholder="Observaciones del documento">
       </x-web.formInput>
      </div>

      <div class="sm:col-span-2">
       <x-web.formLabel for="document">Documento</x-web.formLabel>
       <x-web.formInput type="file" name="document" id="document" required="true">
       </x-web.formInput>
      </div>

     </div>
     <x-web.addModalButton>Agregar</x-web.addModalButton>
    </form>
   </x-slot>
  </x-web.createModal-lg>
 </x-slot>

 <x-slot name="navigation">
  {{ $requests->links() }}
 </x-slot>
</x-web.container>
