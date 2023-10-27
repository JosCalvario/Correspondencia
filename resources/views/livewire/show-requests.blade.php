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
    @php
     $fiveDays = \Carbon\Carbon::today()
         ->subDays(5)
         ->format('Y-m-d');
     $sevenDays = \Carbon\Carbon::today()
         ->subDays(7)
         ->format('Y-m-d');
     $fiftDays = \Carbon\Carbon::today()
         ->subDays(15)
         ->format('Y-m-d');
     $thirtDays = \Carbon\Carbon::today()
         ->subDays(30)
         ->format('Y-m-d');
    @endphp
    <x-web.filterOption filterModel="filters.date" value="all">Todos</x-web.filterOption>
    <x-web.filterOption filterModel="filters.date" value="{{ $fiveDays }}">Hace 5 días</x-web.filterOption>
    <x-web.filterOption filterModel="filters.date" value="{{ $sevenDays }}">Hace 7 días</x-web.filterOption>
    <x-web.filterOption filterModel="filters.date" value="{{ $fiftDays }}">Hace 15 días</x-web.filterOption>
    <x-web.filterOption filterModel="filters.date" value="{{ $thirtDays }}">Hace 30 días</x-web.filterOption>
   </x-slot>
  </x-web.filtersSelect>
 </x-slot>

 <x-slot name="Table">
  <x-web.table headers="Folio|Número interno|Nombre|Tipo|Fecha|Remitente|Asunto|Área asignada|Documento|Contestación">
   <x-slot name="data">
    @foreach ($requests as $request)
     @php
      $response_date = \Carbon\Carbon::parse($request->response_date);
      $today = \Carbon\Carbon::today();
      if($request->knowledge == 1)
      {
        $color = 'black';
        $bgColor = 'bg-sc_quartz';
      }
      elseif (count($request->responses)>0) {
        if ($request->responses->first()->document!='') {
            $color = 'sc_greeny';
            $bgColor = 'bg-sc_bg_green';
        }
        else {
            $color = 'sc_greener';
            $bgColor = 'bg-sc_greeny';
        }
        
      }
      elseif ($request->urgent == 1) {
        $color = 'sc_red';
        $bgColor = 'bg-sc_bg_red';
      }
      elseif ($response_date >= $today) {
        $color = 'yellow-700';
        $bgColor = 'bg-[#EBE3B2]';
      }
      else{
        $color = 'blue-800';
        $bgColor = 'bg-blue-300';
      }
      
     @endphp
     <x-web.tableRow options="true">

      <x-slot name="tableData">
       <x-web.tableData label='Folio' bgColor="{{ $bgColor }}"
        color="text-{{ $color }}">{{ $request->folio }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $request->number }}</x-web.tableData>
       <x-web.tableData label='Nombre'>{{ $request->name }}</x-web.tableData>
       <x-web.tableData label='Tipo de documento'>{{ $request->document_type }}</x-web.tableData>
       <x-web.tableData label='Fecha'>{{ $request->date }}</x-web.tableData>
       <x-web.tableData label='Emisor'>{{ $request->sender }}</x-web.tableData>
       <x-web.tableData label='Asunto'>{{ $request->subject }}</x-web.tableData>
       <x-web.tableData label='Departamento'>{{ $request->area->name }}</x-web.tableData>
       @if ($request->document != '')
        <x-web.tableDataFile storage="requests">{{ $request->document }}</x-web.tableDataFile>
       @else
        <td></td>
       @endif

       {{-- Bóton ver contestación ============================================== --}}

       <td data-label="Contestación"
        class=" before:content-[attr(data-label)] text-left before:mb-2 sm:before:content-none sm:px-10 px-3 py-3 sm:table-cell before:block before:font-semibold flex flex-col justify-center">
        @can('responses.index')
        @if ($request->knowledge == 1)
            De conocimiento
        @else
            @if (count($request->responses)>0)
            <a href="{{ route('requests.response', $request->id) }}"
                class="px-3 py-2 text-sm font-medium text-center text-white bg-sc_greeny rounded-lg hover:bg-sc_greener hover:cursor-pointer">Ver</a>

            @else
            Sin atender
            @endif
        @endif
        
         
        @endcan

       </td>

       <td class="flex justify-end items-center">
        <a href="{{ route('requests.show', $request->id) }}"
         class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
         type="button">
         <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
         </svg>
        </a>

       </td>
      </x-slot>

      <x-slot name="detailModal">
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
      <div>
        <x-web.formLabel for="response_date">Fecha de respuesta</x-web.formLabel>
        <x-web.formInput type="date" name="response_date" required="true">
        </x-web.formInput>
       </div>
      <div>
        <x-web.formLabel for="knowledge">¿Es de conocimiento?</x-web.formLabel>

        <div class="h-11 flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="knowledge" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Si</label>
            <input checked id="bordered-radio-2" type="radio" value="0" name="knowledge" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
        </div>
        

      </div>
      <div>
        <x-web.formLabel for="urgent">¿Es urgente?</x-web.formLabel>

        <div class="h-11 flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="urgent" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Si</label>
            <input checked id="bordered-radio-2" type="radio" value="0" name="urgent" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
        </div>
        

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
