<x-web.container title="Solicitudes" search="true" actions="false" filters="true" add="true">

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
  <x-web.table headers="Folio|Número interno|Nombre|Tipo|Fecha|Remitente|Asunto|Área asignada|Documento|Contestación">
   <x-slot name="data">
    @foreach ($requests as $request)
     @php
      $date = \Carbon\Carbon::parse($request->date);
      $today = \Carbon\Carbon::today();
      $days = $today->diffInDays($date);
      $color = 'sc_greeny';
      if ($days >= 5) {
          $color = 'sc_sandy';
      }
      if ($days >= 7) {
          $color = 'sc_red';
      }
      
     @endphp
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData label='Folio' color="text-{{ $color }}">{{ $request->folio }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $request->number }}</x-web.tableData>
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

       {{-- Bóton contestar ============================================== --}}
       <td data-label="Fecha"
        class=" before:content-[attr(data-label)] text-left before:mb-2 sm:before:content-none px-5 py-3 sm:table-cell block before:block before:font-semibold">
        <button type="button" data-modal-toggle="answer{{ $request->id }}"
         class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener hover:cursor-pointer">Contestar</button>
       </td>


       <div id="answer{{ $request->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-x-hidden fixed m-auto top-0 right-0 left-0 z-50 justify-center items-center w-full md:h-auto ">
        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
         <!-- Modal content -->
         <div
          class="relative m-auto p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-y-hidden h-[calc(100vh-2rem)]">
          <!-- Modal header -->
          <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
           <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Solicitud: {{ $request->folio }}
           </h3>
           <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="answer{{ $request->id }}">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Cerrar</span>
           </button>
          </div>
          <!-- Modal body -->

          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
          <form action="{{ route('folios.store') }}" method="POST">
           @csrf
           @method('POST')
           <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
            <div class="">
             <label for="applicant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
             <input type="text" name="applicant" id="applicant"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              disabled readonly value="{{ auth()->user()->name }}">
            </div>
            <div class="">
             <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
             <input type="text" name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              readonly value="{{ auth()->user()->email }}">
            </div>
            <div class="">
             <label for="area"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
             <input type="text" name="area" id="area"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              readonly disabled value="{{ auth()->user()->area?->name }}">
            </div>
            <div>
             <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
              documento</label>
             <input type="text" name="document_type" id="document_type"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              required="" list="document_types">
             <datalist id="document_types">
              <option value="Oficio"></option>
              <option value="Memorándum"></option>
              <option value="Circular"></option>
             </datalist>
            </div>
            <div class="">
             <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
             <input type="date" name="date" id="date"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div class="">
             <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto</label>
             <input type="text" name="subject" id="subject"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div class="">
             <label for="recieves" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receptor</label>
             <input type="text" name="recieves" id="recieves"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div class="">
             <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo del
              receptor</label>
             <input type="text" name="position" id="position"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
        </div>
       </div>
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
         @if ($request->document != '')
          <x-web.modalButton doc="{{ $request->document }}">
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
       <x-web.formInput type="text" name="dependency" id="dependency" required="false">
       </x-web.formInput>
      </div>
      <div>
       <x-web.formLabel for="department">Departamento</x-web.formLabel>
       <x-web.formInput type="text" name="department" id="department" required="false">
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
      {{-- <div class="sm:col-span-2">
       <x-web.formLabel for="theme">Tema</x-web.formLabel>
       <x-web.formInput type="text" name="theme" id="subject" required="true">
       </x-web.formInput>
      </div> --}}
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
       <x-web.formInput type="textarea" name="observations" id="observations" rows="2" required="false"
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

{{-- Errores de formulaio --}}
@foreach ($errors->all() as $error)
 <div
  class="bg-red-400 absolute bottom-0 right-0 w-60 text-white font-semibold flex items-center justify-center mr-5 mb-5 h-14 text-base rounded-lg">
  {{ $error }}</div>
@endforeach
