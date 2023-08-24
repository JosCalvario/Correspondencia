<x-web.container createmodalId="createModal" title="Solicitudes" addText="Agregar documento">
 <x-slot name="Table">
  <x-web.table headers="Número|Nombre|Tipo|Fecha|Remitente|Asunto|Área asignada|Documento|Contestación">
   <x-slot name="data">
    @foreach ($requests as $request)
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData>{{ $request->number }}</x-web.tableData>
       <x-web.tableData>{{ $request->name }}</x-web.tableData>
       <x-web.tableData>{{ $request->document_type }}</x-web.tableData>
       <x-web.tableData>{{ $request->date }}</x-web.tableData>
       <x-web.tableData>{{ $request->sender }}</x-web.tableData>
       <x-web.tableData>{{ $request->subject }}</x-web.tableData>
       <x-web.tableData>{{ $request->area->name }}</x-web.tableData>
       @if ($request->document != '')
        <x-web.tableDataFile>{{ $request->number }}</x-web.tableDataFile>
       @else
        <td></td>
       @endif
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
  <x-web.createModal-lg createmodalId="createModal">
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
       <x-web.formInput type="comboBox" name="date" id="date" required="true" list="document_types">
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
       <x-web.formLabel for="date">Date</x-web.formLabel>
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
       <x-web.formLabel for="subject">Tema</x-web.formLabel>
       <x-web.formInput type="text" name="subject" id="subject" required="true">
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
     <div class="flex items-center sm:justify-end relative text-center">
      <button type="submit"
       class="text-white inline-flex items-center bg-sc_greeny hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600  dark:hover:bg-primary-700 sm:w-auto w-full dark:focus:ring-primary-800">
       <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
         d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
         clip-rule="evenodd"></path>
       </svg>
       Agregar
      </button>
     </div>
    </form>
   </x-slot>
  </x-web.createModal-lg>
 </x-slot>

 <x-slot name="navigation">
  {{ $requests->links() }}
 </x-slot>
</x-web.container>
